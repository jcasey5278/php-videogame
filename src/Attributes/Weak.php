<?php

namespace Videogame\Attributes;

use Videogame\Interfaces\Attributable;
use Videogame\Interfaces\Attribute;
use Videogame\Interfaces\Combat;

class Weak implements Attribute
{
    protected $expires;
    protected $damage_reduced;
    protected $reduce_damage_multiplier = 0.2;

    public function __construct($expiration)
    {
        $this->expires = $expiration;
    }

    public function affect(Attributable $object)
    {
        if (!$object instanceof Combat) {
            return false;
        }

        !$this->expired() ? $this->reduceDamage($object) : $this->increaseDamage($object);
    }

    private function increaseDamage($object)
    {
        $object->setDamage($object->getDamage() + $this->damage_reduced);
    }

    private function reduceDamage($object)
    {
        $current_damage = $object->getDamage();
        $this->damage_reduced = $current_damage * $this->reduce_damage_multiplier;
        $object->setDamage($current_damage - $this->damage_reduced);
        $this->expires--;
    }


    public function getName(): string
    {
        return 'weakened';
    }

    public function expired(): bool
    {
        return $this->expires <= 0;
    }
    public function setExpiry($expire): void
    {
        $this->expires = $expire;
    }
}
