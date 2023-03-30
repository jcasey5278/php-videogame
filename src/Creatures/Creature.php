<?php

namespace Videogame\Creatures;

use Videogame\Attributes\NullAttribute;
use Videogame\Interfaces\Attacks;
use Videogame\Interfaces\Attributable;
use Videogame\Interfaces\Attribute;
use Videogame\Interfaces\Combat;
use Videogame\Interfaces\Weapon;

abstract class Creature implements Combat, Attacks, Attributable {

    protected $health;
    protected $damage;
    protected $name;
    protected $attacks = [];
    protected $weapon;
    protected $attributes = [];

    public function passAttributes(): array {
        return [new NullAttribute()];
    }

    public function getHealth() {
        return $this->health;
    }

    public function takeDamage(float $damage) {
        $this->health -= $damage;
    }

    public function getDamage() {
        if ($this->weapon instanceof Weapon) {
            return $this->damage + $this->weapon->getDamage();
        }
        return $this->damage;
    }

    public function setHealth(float $newHealth) {
        $this->health = $newHealth;
    }

    public function setDamage(float $newDamage) {
        $this->damage = $newDamage;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function listAttacks(): array {
        return $this->attacks;
    }

    public function callAttack($attack) {
        if ($this->weapon instanceof Attacks) {
            return $this->weapon->callAttack($attack);
        }
        if (in_array($attack, $this->attacks)) {
            return $this->attacks[$attack];
        }
    }


    public function attack(): float {
        $attack = $this->getDamage();
        return $attack;
    }

    public function getWeapon() {
        return $this->weapon;
    }

    public function setWeapon(Weapon $weapon) {
        $this->weapon = $weapon;
        if ($weapon instanceof Attacks) {
            $this->attacks = array_merge($this->attacks, $weapon->listAttacks());
        }
    }

    public function addAttribute(Attribute $attribute) {
        if ($attribute instanceof NullAttribute) {
            return;
        }
        $this->attributes[] = $attribute;
    }

    public function removeAttribute(string $name) {
        foreach ($this->attributes as $index => $attribute) {
            if ($attribute->getName() == $name) {
                unset($this->attributes[$index]);
            }
        }
    }

    public function tick() {
        foreach ($this->attributes as $index => $attribute) {
            $attribute->affect($this);
            if ($attribute->expired()) {
                unset($this->attributes[$index]);
            }
        }
    }

    public function __toString() {
        $attributes = array_map(function ($attribute) {
            return $attribute->getName();
        }, $this->attributes);
        return "\n\rI am "  . $this->getName() . "\n\r
        My Health is: " . $this->getHealth() . "\n\r
        I can do " . $this->getDamage() . " damage \n\r
        I am affected by: " . implode('\n\r', $attributes) . "\n\r";
    }
}
