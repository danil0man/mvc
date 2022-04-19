<?php

namespace App\Card;

use App\Card\Card;

class CardDeck
{
    public function __construct()
    {
        $this->deck = [];
    }

    // Create deck
    public function createCardDeck() {
        $suits = ["♠", "♣", "♥", "♦"];
        $ranks = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
        $values = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];


        // Populate Deck
        for ($suit = 0; $suit < count($suits); $suit++) {
            for ($rank = 0; $rank < count($ranks); $rank++) {
                array_push($this->deck, new Card($suits[$suit], $ranks[$rank], $values[$rank]));
            }
        }
    }

    // Show deck as a string
    public function show()
    {
        $card = [];
        foreach($this->deck as $cards) {
            array_push($card, [$cards->getRank(), $cards->getSuit()]);
        }

        return $card;
    }

    // Shuffle the Deck
    public function shuffleDeck()
    {
        shuffle($this->deck);
    }

    // Draw a card
    public function drawCard()
    {
        $card = array_pop($this->deck);
        return $card;
    }

}
