<?php

namespace Videogame\Attributes;

use Videogame\Interfaces\Attributable;
use Videogame\Interfaces\Attribute;
use Videogame\Interfaces\Combat;

class Bleed implements Attribute
{

    protected $object;
    protected $expires;
    protected $total_damage = 0;

    public function __construct()
    {
        $this->expires = 3;
    }

    public function affect(Attributable $object)
    {
        $this->object = $object;
        if (!$this->expired() && $object instanceof Combat) {
            $this->total_damage += $this->getBleed();
            $newHealth = $object->getHealth() - $this->getBleed();
            $object->setHealth($newHealth);
            $this->expires--;
        }
    }

    protected function getBleed()
    {
        return $this->object->getHealth() * 0.1;
    }

    public function setExpiry($expire): void
    {
        $this->expires = $expire;
    }

    public function getName(): string
    {
        return 'bleed';
    }

    public function expired(): bool
    {
        return $this->expires <= 0;
    }
}
