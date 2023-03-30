<?php

namespace Videogame\Creatures;

use Videogame\Attributes\Bleed;
use Videogame\Attributes\Nighttime;
use Videogame\Attributes\Weak;
use Videogame\Creatures\Creature;
use Videogame\Interfaces\Attribute;

class Vampire extends Creature {

    protected $health = 50;
    protected $damage = 5;
    protected $name = 'Guillermo';
    protected $round = 0;


    public function __construct() {
        $attribute = new Weak(10);
        $this->addAttribute($attribute);
    }

    public function tick() {
        $this->round++;
        if ($this->round % 10 == 5) {
            $attribute = new Nighttime();
            $this->addAttribute($attribute);
        }
        parent::tick();
    }
}
