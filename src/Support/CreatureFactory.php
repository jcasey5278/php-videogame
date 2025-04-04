<?php

namespace Videogame\Support;

use Exception;
use Videogame\Creatures\Creature;
use Videogame\Creatures\Vampire;
use Videogame\Creatures\Elf;
use Videogame\Creatures\PlayObserve;
use Videogame\Creatures\Giant;
use Videogame\Creatures\Human;
use Videogame\Creatures\ShadowMonarch;
use Videogame\Creatures\Werewolf;
use Videogame\Creatures\Zombie;
use Videogame\Creatures\ZombieDog;

class CreatureFactory {

    public function build($type):Creature {
        switch (strtolower($type)) {
            case "human":
                return new Human();
            case "zombie":
                return new Zombie();
            case "zombiedog":
                return new ZombieDog();
            case "elf":
                return new Elf();
            case "vampire":
                return new Vampire();
            case "werewolf":
                return new Werewolf();
            case "playobserve":
                return new PlayObserve();
            case "giant":
                return new Giant();
            case "shadowmonarch":
                return new ShadowMonarch();
            case "zombiewarrior":
                // return new ZombieWarrior();
                
            default:
                throw new Exception("Creature does not exist.");
        }
    }
}
