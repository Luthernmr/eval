<?php

namespace App\DataFixtures;

use App\Entity\Game;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class GameFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $game = new Game();
        $game->setTitle("7 Wonders")
             ->setMinPlayers(2)
             ->setMaxPlayer(7);                            
        
        
        $manager->persist($game);

        $manager->flush();
    }
}
