<?php
namespace Videogame\Attributes;

use Videogame\Interfaces\Attribute;

class NullAttribute implements Attribute{

    public function affect($object){
        return '';
    }

    public function getName(): string
    {
        return "null";
    }

    public function expired(): bool
    {
        return true;
    }

}