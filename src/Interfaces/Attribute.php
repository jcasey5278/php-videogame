<?php

namespace Videogame\Interfaces;
interface Attribute{
    public function affect(Attributable $object);
    public function getName():string;
    public function expired():bool;
    public function setExpiry(int $expire):void;
}