<?php

namespace App\DataFixtures;

use App\Entity\Player;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PlayerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $player = new Player();
        $player->setEmail('luke.skywalker@rogue.sw')
               ->setNickname('Luke');

        $manager->persist($player);
        $manager->flush();
    }
}
