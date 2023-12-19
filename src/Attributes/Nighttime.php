<?php

namespace Videogame\Attributes;

use Videogame\Interfaces\Attributable;
use Videogame\Interfaces\Attribute;
use Videogame\Interfaces\Combat;

class Nighttime implements Attribute {

    protected $expires;
    protected $nighttime_damage_bonus;

    public function __construct() {
        $this->expires = 5;
    }

    public function affect(Attributable $object) {
        if ($object instanceof Combat) {
            if (!$this->expired()) {
                $current_damage = $object->getDamage();
                $this->nighttime_damage_bonus = $current_damage * 0.5;
                $object->setDamage($current_damage + $this->nighttime_damage_bonus);
                $this->expires--;
            } else {
                $object->setDamage($object->getDamage() - $this->nighttime_damage_bonus);
            }
        }
    }

    public function getName(): string {
        return 'nighttime';
    }

    public function expired(): bool {
        return $this->expires <= 0;
    }

    public function setExpiry($expire):void{
        $this->expires = $expire;
    }
}
