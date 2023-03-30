<?php

namespace Videogame\Weapons;

use Videogame\Interfaces\Attacks;

abstract class Weapon implements Attacks {

    protected $attacks = [];
    protected $damage = 0;
    protected $durability = 0;
    protected $pending_attack = '';
    protected $default_attack = '';

    public function getDamage() {
        if ($this->durability < 1) {
            return 0;
        }
        $this->durability--;
        return $this->attacks[$this->pending_attack];
    }

    public function getDurability() {
        return $this->durability;
    }

    public function setDurabilty(float $durability) {
        $this->durability = $durability;
    }

    public function listAttacks(): array {
        return $this->attacks;
    }

    public function callAttack($attack) {
        if (isset($this->attacks[$attack])) {
            $this->pending_attack = $attack;
        } else {
            $this->pending_attack = $this->default_attack;
        }
    }

    public function attack(): float {
        $this->durability--;
        return $this->damage;
    }
}
