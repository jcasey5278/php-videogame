<?php

namespace Videogame\Weapons;

use Videogame\Attributes\Poison;
use Videogame\Interfaces\Attributable;
use Videogame\Interfaces\Attribute;
use Videogame\Weapons\Weapon;


class PoisonDagger extends Weapon implements Attributable{


    public function __construct(Poison $poison = new Poison())
    {
        $this->attributes[] = $poison;
    }

    protected $attacks = [
        'stab',
        'slash'
    ];

    protected $damage = 0;
    protected $durability = 1;
    protected $default_attack = 'stab';
    protected $attributes = [];

    public function getDamage() {
        return $this->attacks[$this->pending_attack];
    }

    public function attack(): float {
        return $this->damage;
    }

    public function addAttribute(Attribute $attribute){

        $this->attributes[] = $attribute;

    }
    
    public function removeAttribute(String $name){

    }

    public function getPassedAttributes():array{
        return [];
    }

    public function setDisabledPassedAttributes(bool $disabled){

    }
}