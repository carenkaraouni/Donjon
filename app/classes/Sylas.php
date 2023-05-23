<?php

require_once('./classes/Ennemi.php');

class Sylas extends Ennemi
{
    public function __construct()
    {
        $this->pol = 15;
        $this->name = "Syslas le demon";
        $this->power = 20;
        $this->constitution = 15;
        $this->speed = 10;
        $this->xp = 20;
        $this->gold = 150;
        $this->photo = "sylas.jpg";
    }

    public function fear()
    {

    }
}