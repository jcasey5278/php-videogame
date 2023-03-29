<?php
namespace Videogame\Support;

use Videogame\Weapons\Bat;
use Videogame\Weapons\Fangs;
use Videogame\Weapons\Fist;
use Videogame\Weapons\RustedSword;

class WeaponFactory{

    public function build($name){
        switch(strtolower($name)){
            case "bat":
                return new Bat();
            case "rusted_sword":
                return new RustedSword();
            case "fangs":
                return new Fangs();
            default:
                return new Fist();
        }
    }
}