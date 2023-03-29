<?php
namespace Videogame\Creatures;
use Videogame\Attributes\Bleed;
use Videogame\Attributes\ElvenBleed;
use Videogame\Creatures\Creature;
use Videogame\Interfaces\Attribute;

class Elf extends Creature{

    protected $health = 20;
    protected $damage = 5;
    protected $name = "Matt";

    public function addAttribute(Attribute $attribute)
    {
        if($attribute instanceof Bleed){
            $attribute = new ElvenBleed();
        }
        parent::addAttribute($attribute);
    }

    public function getDamage()
    {
        $this->damage = rand(0,5);
        return parent::getDamage();
    }
}