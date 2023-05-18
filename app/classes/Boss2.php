<?php

require_once('./classes/Ennemi.php');

class Boss2 extends Ennemi
{
    public function __construct()
    {
        $this->pol = 15;
        $this->name = "Bowser de l'enfer";
        $this->power = 20;
        $this->constitution = 15;
        $this->speed = 10;
        $this->xp = 20;
        $this->gold = 100;
        $this->photo = "boss2.webp";
    }

    public function fear()
    {

    }
}