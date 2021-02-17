<?php

namespace App\DataFixtures;

use App\Entity\Contest;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContestFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $contest = new Contest();
        $contest->setGameId(23)
                ->setStartDate(new \DateTime('2021-02-17 00:00:00'))
                ->setWinnerId(2);

        $manager->persist($contest);

        $manager->flush();
    }
}
