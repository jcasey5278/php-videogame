<?php

namespace Videogame\Creatures;

use Videogame\Attributes\Bleed;
use Videogame\Weapons\Bat;
use Videogame\Weapons\Weapon;

class Giant extends Creature{

    protected $health = 10000;
    protected $damage = 100;
    protected $name = "Grawp";
    protected $round = 1;

    public function __construct()
    {
        $bat = new Bat();
        $this->setWeapon($bat);
    }

    public function setWeapon(Weapon $weapon)
    {
        if($weapon instanceof Bat){
            parent::setWeapon($weapon);
        }
    }

    public function attack():float{
        $damage = 0;
        if( $this->round % 10 == rand(0,2)){
            $damage = parent::attack();
        }
        $this->round++;
        return $damage;
    }

    public function callAttack($attack)
    {
        return parent::callAttack("Smash");
    }

    public function listAttacks(): array
    {
        return ["Smash"];
    }
    
}