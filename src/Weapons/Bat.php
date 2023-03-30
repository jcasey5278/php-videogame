<?php

namespace Videogame\Weapons;

use Videogame\Weapons\Weapon;

class Bat extends Weapon {

    protected $damage = 5;
    protected $default_attack = 'Swing';
    protected $attacks = [
        'Smash' => 12,
        'Pound' => 8,
        'Swing' => 3
    ];
    protected $pending_attack = 'Swing';
}
