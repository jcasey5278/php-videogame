<?php

namespace Videogame\Support;

use Videogame\Attributes\Poison;
use Videogame\Attributes\StrongPoison;
use Videogame\Attributes\WeakPoision;

class PoisonFactory{

    public function build(string $poisonType){
        switch(strtoupper($poisonType)){
            case "STRONG":
                return new StrongPoison();
            case "WEAK":
                return new WeakPoision();
            default:
                return new Poison();
        }
    }
}