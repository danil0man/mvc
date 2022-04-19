<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('card/api/deck', name: 'api', methods: ["GET","HEAD"])]
    public function api(): Response
    {
        $deck = new \App\Card\CardDeck();
        $deck->createCardDeck();
        $data = [
            'cardDeck' => $deck->show()
        ];

        $cardDeck = new JsonResponse($data);
        $cardDeck->setEncodingOptions( $cardDeck->getEncodingOptions() | JSON_UNESCAPED_UNICODE);
        return $cardDeck;
    }

    #[Route('card/api/deck/shuffle', name: 'api_shuffle')]
    public function api_shuffle(): Response
    {
        $deck = new \App\Card\CardDeck();
        $deck->createCardDeck();
        $deck->shuffleDeck();
        $data = [
            'cardDeck' => $deck->show()
        ];

        $cardDeck = new JsonResponse($data);
        $cardDeck->setEncodingOptions( $cardDeck->getEncodingOptions() | JSON_UNESCAPED_UNICODE);
        return $cardDeck;
    }
}
