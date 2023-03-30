<?php

use Videogame\Support\CharacterFactory;

require_once('vendor/autoload.php');

$characterFactory = new CharacterFactory();

$creatures = [
    [
        'creature' => 'zombiedog',
        'weapon' => '',
        'attributes' => []
    ],
    [
        'creature' => 'elf',
        'weapon' => '',
        'attributes' => []
    ]
];
$matt = 0;
$george = 0;
$i = 0;
while ($i < 1000) {
    $players = [];
    foreach ($creatures as $creature) {
        $players[] = $characterFactory->create($creature);
    }
    while (true) {
        foreach ($players as $index => $player) {
            if (count($players) < 2) {
                break 2;
            }
            if ($player->getHealth() < 0) {
                unset($players[$index]);
                break;
            }
            if (count($players) == 2) {
                $opponent = $players[$index == 0];
            }
            if (count($player->listAttacks()) > 1) {
                // $a = readline("Which attack should " . $player->getName() . " do? \n\r"
                // . implode(" "
                // ,array_keys($player->listAttacks()) 
                // ). ":");
                $a = rand() % 3 == 0 ? "pound" : (rand() % 2 == 0 ? 'smash' : 'swing');
                $player->callAttack($a);
            }
            $opponent->takeDamage($player->attack());
            foreach ($player->passAttributes() as $effect) {
                // echo $player->getName() . " is applying " . $effect->getName(). " to ". $opponent->getName() . "\n\r";
                $opponent->addAttribute($effect);
            }
            $player->tick();
            // var_dump($player);
        }
    }
    $i++;
    $survivor = end($players);
    if (!isset($survivors[$player->getName()])) {
        $survivors[$player->getName()] = 0;
    } else {
        $survivors[$player->getName()]++;
    }
}

var_dump($survivors);
