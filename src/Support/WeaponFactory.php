<?php
namespace Videogame\Support;

use Videogame\Weapons\Bat;
use Videogame\Weapons\Fangs;
use Videogame\Weapons\Fist;
use Videogame\Weapons\PoisonDagger;
use Videogame\Weapons\RustedSword;
use Videogame\Weapons\Weapon;

class WeaponFactory{

    public function build($name){
        switch(strtolower($name)){
            case "bat":
                return new Bat();
            case "rusted_sword":
                return new RustedSword();
            case "fangs":
                return new Fangs();
            case "strong-poisondagger":
            case "weak-poisondagger":
            case "poisondagger":
                $poisonFactory = new PoisonFactory();
                return new PoisonDagger($poisonFactory->build($this->cleanDaggerName($name)));
            default:
                return new Fist();
        }
    }

    private function cleanDaggerName(string $name):string{
        $parts = explode('-',$name);
        return $parts[0];
    }
}