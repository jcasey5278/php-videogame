<?php

namespace Videogame\Attributes;

use Videogame\Interfaces\Attributable;
use Videogame\Interfaces\Attribute;
use Videogame\Interfaces\Combat;

class Poison implements Attribute
{

    protected $expires;
    protected $poison_damage = 0.2;
    public function __construct()
    {
        $this->expires = rand(2, 3);
    }

    public function affect(Attributable $object)
    {

        if (!$object instanceof Combat) {
            return;
        }

        $object->setHealth($object->getHealth() * $this->poison_damage);
    }

    public function getName(): string
    {
        return "Poison";
    }

    public function expired(): bool
    {
        return $this->expires <= 0;
    }

    public function setExpiry(int $expire): void
    {
        $this->expires = $expire;
    }
}
