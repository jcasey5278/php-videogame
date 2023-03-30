<?php

namespace Videogame\Creatures;

use Videogame\Creatures\Creature;
use Videogame\Interfaces\Attacks;
use Videogame\Interfaces\Attributable;
use Videogame\Weapons\Weapon;
use Videogame\Weapons\Fangs;

class Werewolf extends Creature {

    protected $health = 40;
    protected $damage = 10;
    protected $name = 'Remus';
    protected $weapon_2;

    public function __construct() {
        $this->setWeapon(new Fangs());
    }

    public function passAttributes(): array {
        $attributes = [];
        if ($this->weapon_2 instanceof Attributable) {
            $attributes = array_merge($attributes, $this->weapon_2->passAttributes());
        }
        return array_merge($attributes, parent::passAttributes());
    }

    public function setWeapon(Weapon $weapon) {
        if (!$weapon instanceof Fangs) {
            $this->weapon_2 = $this->weapon;
        }
        parent::setWeapon($weapon);
    }

    public function getDamage() {
        $damage = $this->damage;
        if ($this->weapon instanceof Weapon) {
            $damage += $this->weapon->getDamage();
        }
        if ($this->weapon_2 instanceof Fangs) {
            $damage += $this->weapon_2->getDamage();
        }
        return $damage;
    }

    public function callAttack($attack) {
        if ($this->weapon_2 instanceof Attacks) {
            return $this->weapon_2->callAttack($attack);
        }
        return parent::callAttack($attack);
    }
}
