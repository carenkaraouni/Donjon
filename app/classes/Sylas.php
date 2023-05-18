<?php

require_once('./classes/Ennemi.php');

class Sylas extends Ennemi
{
    public function __construct()
    {
        $this->pol = 20;
        $this->name = "Syslas le demon";
        $this->power = 30;
        $this->constitution = 15;
        $this->speed = 10;
        $this->xp = 30;
        $this->gold = 200;
        $this->photo = "sylas.jpg";
    }

    public function fear()
    {

    }
}