<?php

namespace Videogame\Creatures;

use Videogame\Attributes\Bleed;
use Videogame\Weapons\Weapon;
use Videogame\Weapons\Fangs;

class ZombieDog extends Zombie {

    protected $name = "Fluffy";
    protected $health = 2000;

    public function passAttributes(): array {
        $attributes = [];
        if (rand() % 2) {
            $attr =  new Bleed();
            $attr->setExpiry(10);
            $attributes[] = $attr;
        }
        return $attributes;
    }

    public function setWeapon(Weapon $weapon) {
        if ($weapon instanceof Fangs) {
            $this->weapon = $weapon;
        } else {
            parent::setWeapon($weapon);
        }
    }
}
