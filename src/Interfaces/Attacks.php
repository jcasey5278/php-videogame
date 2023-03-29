<?php
namespace Videogame\Interfaces;

interface Attacks{


    public function listAttacks():array;

    public function callAttack($attack);

    public function attack():float;
}