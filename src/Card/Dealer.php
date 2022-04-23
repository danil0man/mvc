<?php

namespace App\Card;

class Dealer {
    public $players;
    public $cards;

    public function __construct($players, $cards)
    {
        $this->players = $players;
        $this->cards = $cards;
        $this->nrOfCards = $players * $cards;
    }

    public function getNrOfCards() {
        return $this->nrOfCards;
    }

    public function dealToPlayers($cardArray)
    {
        return array_chunk($cardArray, $this->players);
    }
}