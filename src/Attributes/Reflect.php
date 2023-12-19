<?php

namespace Videogame\Attributes;

use Videogame\Interfaces\Attributable;
use Videogame\Interfaces\Attribute;
use Videogame\Interfaces\Combat;

class Reflect implements Attribute{

    protected $expired = 3;
    protected $damage;
    protected $exist = 0;
    public function affect(Attributable $object)
    {
        $this->expired--;
        if($object instanceof Combat){
            if($this->exist == 0){
                $this->damage = $object->getDamage();
                $object->setDamage(0);
                $this->exist = 1;
            }
            if(!$this->expired()){
                $object->setDisabledPassedAttributes(false);
                $passedAttributes = $object->getPassedAttributes();
                if(count($passedAttributes) > 0){
                    foreach($passedAttributes as $attribute){
                        $object->addAttribute($attribute);
                    }
                }
                $object->setDisabledPassedAttributes(true);
                $object->takeDamage($this->damage);    
            }else{
                $object->setDisabledPassedAttributes(true);
                $object->setDamage($this->damage);
            }
        }

    }

    public function getName(): string
    {
        return "Reflect";
    }

    public function expired(): bool
    {
        return $this->expired == 0;
    }

    public function setExpiry(int $expire): void
    {
        $this->expired = $expire;
    }
}