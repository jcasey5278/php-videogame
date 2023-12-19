<?php

namespace Videogame\Creatures;

class ShadowDwarf extends Creature{

    protected $damage = 100;
    protected $health = 1;
    protected $name = 'Rick';

    public function attack(): float
    {
        $this->damage = rand(50,100);
        $this->health = $this->damage;
        return $this->damage;
    }

}