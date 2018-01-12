<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 12/01/18
 * Time: 11:24
 */

namespace AppBundle\DataFixture;

use AppBundle\Entity\ResourceTheme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ResourceThemeFixture extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $resourceThemes = [
            0 => ['Activités gaspillage alimentaire'],
            1 => ['Activités alimentation'],
            2 => ['Activités gestion des déchets'],
            3 => ['Autres ressources'],
        ];

        foreach ($resourceThemes as $resourceTheme) {
            $theme = new ResourceTheme();
            $theme->setName($resourceTheme[0]);
            $manager->persist($theme);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 6;
    }
}