<?php
namespace Videogame\Support;


use Videogame\Attributes\Bleed;
use Videogame\Attributes\NullAttribute;
use Videogame\Attributes\Reflect;

class AttributeFactory{

    public function build($type){
        switch(strtolower($type)){
            case "bleed":
                return new Bleed();
            case "reflect":
                return new Reflect();
            default:
                return new NullAttribute();
        }
    }
    
}