<?php

namespace Videogame\Weapons;

use Videogame\Interfaces\Attacks;
use Videogame\Interfaces\Weapon;

class Fist implements Weapon,Attacks{

    public function getDamage()
    {
        return 1;
    }

    public function getDurability()
    {
        return 9999;
    }

    public function setDurabilty(float $durability){
        
    }

    public function attack():float
    {
        $this->getDamage();
    }

    public function listAttacks():array
    {
        return [];
    }
    

    public function callAttack($attack)
    {
        
    }

}