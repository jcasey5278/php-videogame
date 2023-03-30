<?php

namespace Videogame\Creatures;

use Videogame\Interfaces\Attribute;
use Videogame\Creatures\Creature;
use Videogame\Weapons\Weapon;

class GameWatch extends Creature {

    protected $health = 100;
    protected $damage = 999999999999;
    protected $name = 'Mr. Game & Watch';
    protected $chance = 10;


    public function getDamage() {
        if (rand(1, $this->chance) == 1) {
            $this->chance = 10;
            return $this->damage;
        }
        $this->chance--;
        return 0;
    }

    public function setWeapon(Weapon $weapon) {
        return null;
    }

    public function addAttribute(Attribute $attribute) {
        //Not assigning this method because Mr. Game & Watch is not affected by attributes
    }
}
