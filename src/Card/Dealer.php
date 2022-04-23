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
        $this->cardsToDeal = [];
    }

    public function cardsToDeal($deck)
    {
        for ($i = 0; $i < $this->nrOfCards; $i++) {
            array_push($this->cardsToDeal, $deck);
        }
    }

    public function dealToPlayers()
    {
        return array_chunk($this->cardsToDeal, $this->players);
    }
}