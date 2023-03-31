<?php
namespace Videogame\Support;

use Videogame\Creatures\Creature;
use Videogame\Creatures\LightDwarf;
use Videogame\Creatures\ShadowDwarf;

class DwarvenFactory extends CreatureFactory{

    public function build($type):Creature {
            switch($type){
                case "shadowdwarf":
                    return new ShadowDwarf();
                case "lightdwarf":
                    return new LightDwarf();
                default:
                    return parent::build($type);
            }
    }
}