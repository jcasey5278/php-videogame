<?php
namespace Videogame\Attributes;
use Videogame\Attributes\Bleed;

class ElvenBleed extends Bleed{


    public function getBleed(){
        return -$this->object->getHealth() * 0.75;
    }
}