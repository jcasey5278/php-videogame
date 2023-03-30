<?php

namespace Videogame\Creatures;

use Videogame\Attributes\Bleed;
use Videogame\Weapons\Weapon;
use Videogame\Weapons\Fangs;

class ZombieDog extends Zombie {

    protected $name = "Fluffy";

    public function passAttributes(): array {
        $attributes = [];
        if (rand() % 2) {
            $attributes[] = new Bleed();
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
