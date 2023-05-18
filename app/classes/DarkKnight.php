<?php

require_once('./classes/Ennemi.php');

class DarkKnight extends Ennemi
{
    public function __construct()
    {
        $this->pol = 10;
        $this->name = "Chevalier Noir";
        $this->power = 15;
        $this->constitution = 15;
        $this->speed = 5;
        $this->xp = 20;
        $this->gold = 100;
        $this->photo = "autocollants-en-vinyle-de-fortnite-chevalier-noir.jpg";
    }

    public function fear()
    {

    }
}