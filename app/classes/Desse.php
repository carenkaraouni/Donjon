<?php

require_once('./classes/Ennemi.php');

class Desse extends Ennemi
{
    public function __construct()
    {
        $this->pol = 10;
        $this->name = "La Déesse du feu";
        $this->power = 20;
        $this->constitution = 10;
        $this->speed = 8;
        $this->xp = 15;
        $this->gold = 50;
        $this->photo = "pele02.jpg";
    }

    public function fear()
    {

    }
}