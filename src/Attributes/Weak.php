<?php

namespace Videogame\Attributes;

use Videogame\Interfaces\Attributable;
use Videogame\Interfaces\Attribute;
use Videogame\Interfaces\Combat;

class Weak implements Attribute {
    protected $expires;
    protected $damage_reduced;

    public function __construct($expiration) {
        $this->expires = $expiration;
    }

    public function affect(Attributable $object) {
        if ($object instanceof Combat) {
            if (!$this->expired()) {
                $current_damage = $object->getDamage();
                $this->damage_reduced = $current_damage * 0.2;
                $object->setDamage($current_damage - $this->damage_reduced);
                $this->expires--;
            } else {
                $object->setDamage($object->getDamage() + $this->damage_reduced);
            }
        }
    }


    public function getName(): string {
        return 'weakened';
    }

    public function expired(): bool {
        return $this->expires <= 0;
    }
    public function setExpiry($expire):void{
        $this->expires = $expire;
    }
}
