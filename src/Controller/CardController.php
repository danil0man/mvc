<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

if (!isset($_SESSION)) session_start();

class CardController extends AbstractController
{
    #[Route('card', name: 'card')]
    public function index(): Response
    {
        return $this->render('card/index.html.twig');
    }
    

    #[Route('/card/deck', name: 'deck')]
    public function deck(): Response
    {
        $deck = new \App\Card\CardDeck();
        $deck->createCardDeck();
        $data = [
            'cardDeck' => $deck->show()
        ];
        return $this->render('card/deck.html.twig', $data);
    }

    #[Route('/card/deck2', name: 'deck2')]
    public function deck2(): Response
    {
        $deck = new \App\Card\CardDeckWithJokers();
        $deck->createCardDeck();
        $deck->addJokers();
        $data = [
            'cardDeck' => $deck->show()
        ];
        return $this->render('card/deck2.html.twig', $data);
    }

    #[Route('/card/shuffle', name: 'shuffle')]
    public function shuffle(SessionInterface $session): Response
    {

        $session->set('shuffle', new \App\Card\CardDeck());
        $session->get('shuffle')->createCardDeck();
        $session->get('shuffle')->shuffleDeck();
        $data = [
            'cardDeck' => $session->get('shuffle')->show()
        ];
        return $this->render('card/shuffle.html.twig', $data);
    }

    #[Route('card/draw', name: 'draw')]
    public function draw(SessionInterface $session): Response
    {
        if (!$session->get('shuffle')) {
            $session->set('shuffle', new \App\Card\CardDeck());
            $session->get('shuffle')->createCardDeck();
            $session->get('shuffle')->shuffleDeck();
        } else {
            $session->get('shuffle')->shuffleDeck();
        } 

        $data = [
            'popped' => $session->get('shuffle')->drawCard(),
            'cardDeck' => $session->get('shuffle')->show()
        ];

        return $this->render('card/draw.html.twig', $data);
    }

    #[Route('card/draw/:{number}', name:'draw_many')]
    public function drawMany(SessionInterface $session, $number): Response
    {
        $cards = [];
        if (!$session->get('shuffle')) {
            $session->set('shuffle', new \App\Card\CardDeck());
            $session->get('shuffle')->createCardDeck();
            $session->get('shuffle')->shuffleDeck();
        } else {
            $session->get('shuffle')->shuffleDeck();
        }

        for ($i = 0; $i < $number; $i++) {
            array_push($cards, $session->get('shuffle')->drawCard());
        }

        $data = [
            'cards' => $cards,
            'cardDeck' => $session->get('shuffle')->show(),
        ];

        return $this->render('card/drawMany.html.twig', $data);
    }

    #[Route('card/deck/deal/:{players}/:{cards}', name: 'deal')]
    public function deal($cards, $players): Response
    {
        $cardArray = [];
        $nrOfCards = $players * $cards;

        $deck = new \App\Card\CardDeck();
        $deck->createCardDeck();
        $deck->shuffleDeck();
        
        
        for ($i = 0; $i < $nrOfCards; $i++) { 
            array_push($cardArray, $deck->drawCard());
        }

        $data = [
            'cards' => array_chunk($cardArray, $players),
            'cardDeck' => $deck->show()
        ];
        return $this->render('card/deal.html.twig', $data);

    }


}
