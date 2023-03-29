<?php
namespace Videogame\Weapons;
use Videogame\Interfaces\Weapon;

class Fangs implements Weapon{

    protected $durability = 2;

    public function getDamage()
    {
        if($this->durability < 1){
            return 0;
        }
        $this->durability--;
        return 3;
    }

    public function getDurability()
    {
        return 4;
    }
}