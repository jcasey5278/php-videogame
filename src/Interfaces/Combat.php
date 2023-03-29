<?php
namespace Videogame\Interfaces;

interface Combat {
    public function getHealth();
    public function getDamage();
    //If bro wants to heal
    public function setHealth(float $newHealth);
    public function setDamage(float $newDamage);
    public function takeDamage(float $damage);
}