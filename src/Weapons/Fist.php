<?php

namespace Videogame\Weapons;

use Videogame\Weapons\Weapon;

class Fist extends Weapon {

    public function getDamage() {
        return 1;
    }

    public function setDurabilty(float $durability) {
        //Fists do not have durability changed
    }

    public function attack(): float {
        return $this->getDamage();
    }
}
