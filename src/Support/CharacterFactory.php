<?php

namespace Videogame\Support;

/*
    Abstract factory that builds a creature with possible weapons
*/
class CharacterFactory{

    protected $creatureFactory;
    protected $weaponFactory;
    protected $attributeFactory;
    public function __construct()
    {
        $this->creatureFactory = new CreatureFactory();
        $this->weaponFactory = new WeaponFactory();
        $this->attributeFactory = new AttributeFactory();
    }

    public function setCreatureFactory(CreatureFactory $factory){
        $this->creatureFactory = $factory;
    }

    public function create(array $entry){
        $creature = $this->creatureFactory->build($entry['creature']);
        $weapon = $this->weaponFactory->build($entry['weapon']);
        $creature->setWeapon($weapon);
        foreach($entry['attributes'] as $attribute){
            $creature->addAttribute($this->attributeFactory->build($attribute));
        }
        return $creature;
    }


}