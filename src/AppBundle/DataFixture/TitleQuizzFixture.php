<?php
/**
 * Created by PhpStorm.
 * User: wilder5
 * Date: 10/01/18
 * Time: 08:47
 */

namespace AppBundle\DataFixture;

use AppBundle\Entity\QuizzTitle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class TitleQuizzFixture extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $titleQuizzs = [
            0 => [
                'L\'alimentation',
                'images/quizzImages/Alimentation/Alimentation.jpg',
            ],
            1 => [
                'La saisonnalité',
                'images/quizzImages/Saisonnalite/Saison.png'
            ],
            2 => [
                'L\'impact sur la planète',
                'images/quizzImages/Impact/Gaspillage.jpg',
            ],
            3 => [
                'La nutrition',
                'images/quizzImages/Nutrition/Nutrition.png',
            ]
        ];

        $i = 0;
        foreach ($titleQuizzs as $titleQuizz) {
            $i++;
            $titleHomeQuizz = new QuizzTitle();
            $titleHomeQuizz->setName($titleQuizz[0]);
            $this->addReference('title' . $i, $titleHomeQuizz);
            $titleHomeQuizz->setImgTitleQuizz($titleQuizz[1]);
            $manager->persist($titleHomeQuizz);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}