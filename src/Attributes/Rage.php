<?php

namespace Videogame\Attributes;

use Videogame\Interfaces\Attributable;
use Videogame\Interfaces\Attribute;
use Videogame\Interfaces\Combat;

class Rage implements Attribute {

    protected $object;
    protected $expires;
    protected $rage_damage_bonus;

    public function __construct() {
        $this->expires = 5;
    }

    public function affect(Attributable $object) {
        if ($object instanceof Combat) {
            if (!$this->expired()) {
                $current_damage = $object->getDamage();
                $this->rage_damage_bonus = $current_damage * 0.2;
                $object->setDamage($current_damage + $this->rage_damage_bonus);
                $this->expires--;
            } else {
                $object->setHealth($object->getHealth() * 0.9);
                $object->setDamage($object->getDamage() - $this->rage_damage_bonus);
            }
        }
    }


    public function getName(): string {
        return 'rage';
    }

    public function expired(): bool {
        return $this->expires <= 0;
    }

    public function setExpiry($expire):void{
        $this->expires = $expire;
    }
}
