<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 07/01/18
 * Time: 14:23
 */

namespace AppBundle\DataFixture;


use AppBundle\Entity\CategoryChallenge;
use AppBundle\Entity\DescriptionChallenge;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CategoriesFixture extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $categoryChallengeHome = new CategoryChallenge();
        $categoryChallengeHome->setName('home');
        $manager->persist($categoryChallengeHome);

        $categoryChallengeSchool = new CategoryChallenge();
        $categoryChallengeSchool->setName('school');
        $manager->persist($categoryChallengeSchool);

        $categoryChallengeOrganization = new CategoryChallenge();
        $categoryChallengeOrganization->setName('organization');
        $manager->persist($categoryChallengeOrganization);

        $manager->flush();
        $this->addReference('categoryHome', $categoryChallengeHome);
        $this->addReference('categorySchool', $categoryChallengeSchool);
        $this->addReference('categoryOrganization', $categoryChallengeOrganization);

    }

    public function getOrder()
    {
        return 1;
    }

}
