<?php

namespace Videogame\Weapons;

use Videogame\Attributes\Bleed;
use Videogame\Interfaces\Attributable;
use Videogame\Interfaces\Attribute;

class Fangs extends Weapon implements Attributable {

    protected $durability = 2;
    protected $attacks = [
        'Bite' => 8,
        'Crunch' => 5,
        'Swing' => 1
    ];
    protected $default_attack = 'Bite';

    public function passAttributes(): array {
        $attributes = [];
        if (rand() % 2) {
            $attributes[] = new Bleed();
        }
        return $attributes;
    }

    public function addAttribute(Attribute $attribute) {
        //Fangs are not affected by attributes
    }

    public function removeAttribute(string $name) {
        //Fangs are not affected by attributes
    }
}
