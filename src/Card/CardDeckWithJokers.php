<?php

namespace App\Card;

use App\Card\Card;
use App\Card\CardDeck;

class CardDeckWithJokers extends CardDeck
{
    public function addJokers()
    {
        array_push($this->deck, new Card('♥', '🃏', 1));
        array_push($this->deck, new Card('♠', '🃏', 1));
    }
}

