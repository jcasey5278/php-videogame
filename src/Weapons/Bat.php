<?php
namespace Videogame\Weapons;

use Videogame\Interfaces\Attacks;
use Videogame\Interfaces\Weapon;

class Bat implements Weapon, Attacks{

    protected $durability = 10;
    protected $damage = 10;
    protected $attacks = [
        'Smash'=>12,
        'Pound'=>8,
        'Swing'=>3
    ];

    protected $pending_attack = 'Swing';

    public function getDamage()
    {
        return $this->attacks[$this->pending_attack];
    }

    public function getDurability()
    {
        return $this->durability;
    }

    public function setDurabilty(float $durability){
        $this->durability = $durability;
    }

    public function attack():float
    {
        $this->durability--;
        return $this->damage;
    }

    public function listAttacks():array
    {
        return $this->attacks;
    }
    

    public function callAttack($attack)
    {
        if(isset($this->attacks[$attack])){
            $this->pending_attack = $attack;
        }else{
            $this->pending_attack = "Swing";
        }
    }


}