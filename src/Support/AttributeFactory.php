<?php
namespace Videogame\Support;


use Videogame\Attributes\Bleed;
use Videogame\Attributes\NullAttribute;

class AttributeFactory{

    public function build($type){
        switch(strtolower($type)){
            case "bleed":
                return new Bleed();
            default:
                return new NullAttribute();
        }
    }
    
}