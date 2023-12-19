<?php
namespace Videogame\Interfaces;

interface Attributable{

    public function addAttribute(Attribute $attribute);
    public function removeAttribute(String $name);
    public function getPassedAttributes():array;
    public function setDisabledPassedAttributes(bool $disabled);
}