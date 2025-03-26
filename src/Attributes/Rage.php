<?php

namespace Videogame\Attributes;

use Videogame\Interfaces\Attributable;
use Videogame\Interfaces\Attribute;
use Videogame\Interfaces\Combat;

class Rage implements Attribute
{
    const EXPIRY_COUNT = -3;
    protected $object;
    protected $expires;
    protected $rage_damage_bonus;
    protected $reduce_health_multiplier = 0.9;
    protected $damage_multiplier = 0.2;

    public function __construct($expiry = 5)
    {
        $this->expires = $expiry;
    }

    public function affect(Attributable $object)
    {
        if (!$object instanceof Combat) {
            return false;
        }

        if (!$this->expired()) {
            $this->damageBoost($object);
        } else {
            $this->reduceHealth($object)->reduceDamage($object);
        }

        $this->expires--;
    }

    private function reduceDamage($object)
    {
        $object->setDamage($object->getDamage() - $this->rage_damage_bonus);
        return $this;
    }

    private function reduceHealth($object)
    {
        $object->setHealth($object->getHealth() * $this->reduce_health_multiplier);
        return $this;
    }

    /**
     * Applies a damage boost
     */
    private function damageBoost($object)
    {
        $current_damage = $object->getDamage();
        $this->rage_damage_bonus = $current_damage * $this->damage_multiplier;
        $object->setDamage($current_damage + $this->rage_damage_bonus);
        return $object;
    }


    public function getName(): string
    {
        return 'rage';
    }

    public function expired(): bool
    {
        return $this->expires <= self::EXPIRY_COUNT;
    }

    public function setExpiry($expire): void
    {
        $this->expires = $expire;
    }
}
