<?php

namespace Videogame\Creatures;

use Exception;
use Videogame\Weapons\PoisonDagger;
use Videogame\Weapons\Weapon;

class ShadowMonarch extends Creature{
    
    public function __construct(PoisonDagger $dagger = new PoisonDagger())
    {
        $this->weapon = $dagger;
    }

    protected $health = 1000;
    protected $damage = 300;
    protected $name = "Jinwoo";
    protected $attacks = [
        'dash',
    ];
    protected $weapon;
    protected $attributes = [];
    protected $disabledPassedAttributes;


    public function setWeapon(Weapon $weapon) {
        if (!$weapon instanceof PoisonDagger) {
            throw new Exception("System: You cannot use anything except Daggers for now...");   
        }
        $this->weapon = $weapon;
    }

}