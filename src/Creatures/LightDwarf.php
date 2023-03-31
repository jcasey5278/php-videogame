<?php

namespace Videogame\Creatures;

class LightDwarf extends Creature{

    protected $damage = 1;
    protected $health = 100;
    protected $name = "Larry";


    public function takeDamage(float $damage)
    {
        if(rand(0,99)%2 == 0){
            parent::takeDamage($damage);
        }
    }
}