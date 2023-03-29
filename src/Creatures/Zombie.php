<?php
namespace Videogame\Creatures;

use Videogame\Interfaces\Weapon;

class Zombie extends Creature{

    protected $name = "Zobie";
    protected $damage = 5;
    protected $health = 20;

    public function takeDamage(float $damage)
    {
        $this->health -= $damage * 0.9;
        $this->damage *= 1.1;
    }

    public function setWeapon(Weapon $weapon)
    {
        return null;
    }
}