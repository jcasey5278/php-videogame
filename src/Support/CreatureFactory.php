<?php
namespace Videogame\Support;

use Exception;
use Videogame\Creatures\Elf;
use Videogame\Creatures\Human;
use Videogame\Creatures\Zombie;
use Videogame\Creatures\ZombieDog;

class CreatureFactory{

    public function build($type){
        switch(strtolower($type)){
            case "human":
                return new Human();
            case "zombie":
                return new Zombie();
            case "zombiedog":
                return new ZombieDog();
            case "elf":
                return new Elf();
            case "zombiewarrior":
                // return new ZombieWarrior();
            default:
                throw new Exception("Creature does not exist.");
        }
    }

}