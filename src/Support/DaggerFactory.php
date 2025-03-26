<?php

namespace Videogame\Support;

use Videogame\Weapons\PoisonDagger;

class DaggerFactory{
    public function build(){
        return new PoisonDagger();
    }
}