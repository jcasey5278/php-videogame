<?php
namespace Videogame\Attributes;

use Videogame\Interfaces\Attribute;

class NullAttribute implements Attribute{

    protected $expires;

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

    public function setExpiry($expire):void{
        $this->expires = 0;
    }
}