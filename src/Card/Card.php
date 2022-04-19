<?php

namespace App\Card;

class Card
{
    public $suit;
    public $rank;
    public $value;

    public function __construct($suit, $rank, $value)
    {
        $this->suit = $suit;
        $this->rank = $rank;
        $this->value = $value;
    }

    public function getSuit()
    {
        return "$this->suit";
    }

    public function getRank()
    {
        return "$this->rank";
    }


}
