<?php

namespace App\DataFixtures;

use App\Entity\PlayerContest;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PlayerContestFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $playerContest = new PlayerContest();
        $playerContest->setPlayerId(1)
                      ->setContestId(1);
                      
        $manager->persist($playerContest);

        $manager->flush();
    }
}
