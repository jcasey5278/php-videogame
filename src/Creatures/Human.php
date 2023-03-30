<?php

namespace Videogame\Creatures;

use Videogame\Attributes\Rage;

class Human extends Creature {
    protected $name = "George";
    protected $damage = 1;
    protected $health = 200;
    protected $threshhold;

    public function __construct() {
        $this->threshhold = $this->health * 0.4;
    }


    public function takeDamage(float $damage) {
        parent::takeDamage($damage);

        if ($this->health <= $this->threshhold) {
            $attribute = new Rage();

            $enraged = false;
            foreach ($this->attributes as $attr) {
                if ($attr->getName() == $attribute->getName()) {
                    $enraged = true;
                }
            }
            if (!$enraged) {
                parent::addAttribute($attribute);
            }
        }
    }
}
