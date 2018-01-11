<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 07/01/18
 * Time: 12:23
 */

namespace AppBundle\DataFixture;

use AppBundle\Entity\CategoryChallenge;
use AppBundle\Entity\DescriptionChallenge;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DescriptionsFixture extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $descriptionsHome = [
            0 => [
                'Faire des recettes',
                'Tu dois créer deux recettes qui vont te permettre de cuisiner tes restes.<br/>Une fois que tu les auras créées, envoie-nous tes recettes !<br/>Tu peux t\'inspirer de ce site qui propose de cuisiner les restes : <a href="https://www.lebruitdufrigo.fr" target="_blank">lebruitdufrigo.fr</a>',
                0,
                0,
            ],
            1 => [
                'Faire attention aux courses',
                'Prends une photo de tes courses d\'une semaine et partage-la avec nous !<br/>Tu peux aller faire un tour du côté de l\'expo <a href="https://www.dailymotion.com/cdn/manifest/video/x4n8w34.m3u8?auth=1509812504-2688-kiv5
9r6o-7e7381c5d7a8be869940b43ed7f06051" target="_blank">"A table"</a>  pour te donner des idées.',
                1,
                0,
            ],
            2 => [
                'Organiser un repas zéro gaspi',
                'Invite tes amis et fais un apéro ou repas zéro gaspi avec eux ! Fais-nous part de la date de l\'évènement !<br/>"Viens prendre un petit apéro zéro gaspi avec moi ce soir !!!"',
                0,
                0,
            ]
        ];

        $descriptionsSchool = [
            0 => [
                'Créer des affiches de sensibilisation',
                'Crée des affiches de sensibilisation au gaspillage alimentaire et diffuse les dans ton établissement scolaire.<br/>Prends une photo de ton travail réalisé et partage-la avec nous !',
                1,
                0,
            ],
            1 => [
                'Organiser des cours de cuisine',
                'Mets en place un cours de cuisine de restes et de smoothies / Disco-smoothies.<br/>Envoie-nous une photo et au moins une des recettes apprises.',
                1,
                0,
            ],
            2 => [
                'Mettre en place une charte de convives',
                'Mets en place une charte des convives au sein de ta commission menus.<br/>Poste une photo de ta charte des convives !',
                1,
                0,
            ],
            3 => [
                'Organiser une séance de sensibilisation',
                'Organise une séance de visualisation de courts métrages pour sensibiliser au gaspillage alimentaire.<br/>Communique-nous la date et l\'heure de l\'évènement !<br/>Tu trouveras les vidéos à utiliser dans les liens ci-dessous.<br/><br/><a href="http://www.dailymotion.com/video/x13fp" target="_blank">L\'ile aux fleurs</a><br/><a href="http://www.dailymotion.com/video/xrhzkq" target="_blank">Taste the Waste</a><br/><a href="https://www.youtube.com/watch?v=HYHiWSSC9-Y" target="_blank">Le gaspillage alimentaire, une question environnementale</a><br/><a href="https://www.youtube.com/watch?v=59FH0MkMxf4" target="_blank">Petit dessin animé qui résume tout !</a><br/><a href="https://www.youtube.com/watch?v=x7o9ZDvcn54" target="_blank">Vidéo du CREPAQ : Accompagnement en restauration scolaire</a><br/><a href="http://www.dailymotion.com/video/xvnoty?start=2" target="_blank">Disco soup de FNE à Paris avec Babette de Rosière</a><br/><a href="http://relais-planete-solidaire.org/fruimalin.html" target="_blank">Association fruti malin - récupération des fruits pour banque alimentaire</a><br/><a href="http://agriculture.gouv.fr/journee-de-cloture-des-etats-generaux-de-lalimentation" target="_blank">Le site officiel du Ministère</a><br/><a href="https://cuisinetesrestes.wordpress.com/" target="_blank">Le blog du CREPAQ - recettes, idées</a><a href="https://cuisinetesrestes.wordpress.com/" target="_blank">Elementerre - Alsace - banque alimentaire</a><br/><a href="https://www.youtube.com/watch?v=v1gjV4-U_SE" target="_blank">Cantine zéro gaspi – Le Mans</a><br/><a href="https://www.youtube.com/watch?v=mMm-Rl3ELIk" target="_blank">Cuisine mobile - Gironde</a><br/><a href="https://www.youtube.com/watch?v=fSDjKGpq1mc" target="_blank">Gaspillage : plongée dans nos poubelles</a><br/><a href="http://www.allocine.fr/video/player_gen_cmedia=18723208&cfilm=112234.html" target="_blank">Notre pain quotidien - bande annonce</a><br/><a href="http://la-kolok.com/episode1/" target="_blank">La Koloc</a>',
                0,
                1,
            ]
        ];

        $descriptionsOrganization = [
            0 => [
                'Proposer un repas local et de saison',
                'Propose un repas local et de saison pour tous les jeunes. <br/>Envoie-nous tes recettes et une photo des légumes de saison que vous avez cuisinés.',
                1,
                0,
            ],

            1 => [
                'Mettre en place un cours de cuisine de restes',
                'Mets en place un cours de cuisine de restes et de smoothies.<br/>Envoie-nous une photo et au moins une des recettes apprises.',
                1,
                0,
            ],
            2 => [
                'Organiser un évènement pour sensibiliser au gaspillage',
                'Organise une disco-smoothie ou une disco-soupe dans la rue pour sensibiliser au gasillage alimentaire.<br/>Envoie les invitations par mail et raconte-nous comment ça s\'est passé en postant une photo et un message !',
                1,
                0,
            ],
            3 => [
                'Organiser un ciné débat dans ta ville',
                'Fait du lien avec ta ville, ton village, et propose un ciné débat.<br/>Communique-nous la date et l\'heure de l\'évènement !<br/>Tu peux utiliser les vidéos présentes dans les liens ci-dessous.<br/><br/><a href="http://www.dailymotion.com/video/x13fp" target="_blank">L\'ile aux fleurs</a ><br/><a href="http://www.dailymotion.com/video/xrhzkq" target="_blank" >Taste the Waste</a ><br/><a href="https://www.youtube.com/watch?v=HYHiWSSC9-Y" target="_blank">Le gaspillage alimentaire, une question environnementale</a><br/><a href="https://www.youtube.com/watch?v=59FH0MkMxf4" target="_blank">Petit dessin animé qui résume tout !</a><br/><a href="https://www.youtube.com/watch?v=x7o9ZDvcn54" target="_blank">Vidéo du CREPAQ : Accompagnement en restauration scolaire</a><br/><a href="http://www.dailymotion.com/video/xvnoty?start=2" target="_blank">Disco soup de FNE à Paris avec Babette de Rosière</a><br/><a href="http://relais-planete-solidaire.org/fruimalin.html" target="_blank">Association fruti malin - récupération des fruits pour banque alimentaire</a><br/><a href="http://agriculture.gouv.fr/journee-de-cloture-des-etats-generaux-de-lalimentation" target="_blank">Le site officiel du Ministère</a><br/><a href="https://cuisinetesrestes.wordpress.com/" target="_blank">Le blog du CREPAQ - recettes, idées</a><a href="https://cuisinetesrestes.wordpress.com/" target="_blank"> Elementerre - Alsace - banque alimentaire</a><br/><a href="https://www.youtube.com/watch?v=v1gjV4-U_SE" target="_blank" >Cantine zéro gaspi – Le Mans</a><br/><a href="https://www.youtube.com/watch?v=mMm-Rl3ELIk" target="_blank">Cuisine mobile - Gironde</a><br/><a href="https://www.youtube.com/watch?v=fSDjKGpq1mc" target="_blank">Gaspillage : plongée dans nos poubelles</a><br/><a href="http://www.allocine.fr/video/player_gen_cmedia=18723208&cfilm=112234.html" target="_blank">Notre pain quotidien - bande annonce</a><br/><a href="http://la-kolok.com/episode1/" target="_blank">La Koloc</a>',
                0,
                1,
            ],
        ];

        foreach ($descriptionsHome as $descriptionHome) {
            $descriptionsChallengeHome = new DescriptionChallenge();
            $descriptionsChallengeHome->setTitle($descriptionHome[0]);
            $descriptionsChallengeHome->setContent($descriptionHome[1]);
            $descriptionsChallengeHome->setCategory($this->getReference('categoryHome'));
            $descriptionsChallengeHome->setIsPicture($descriptionHome[2]);
            $descriptionsChallengeHome->setIsVideo($descriptionHome[3]);
            $manager->persist($descriptionsChallengeHome);
        }

        foreach ($descriptionsSchool as $descriptionSchool) {
            $descriptionsChallengeSchool = new DescriptionChallenge();
            $descriptionsChallengeSchool->setTitle($descriptionSchool[0]);
            $descriptionsChallengeSchool->setContent($descriptionSchool[1]);
            $descriptionsChallengeSchool->setCategory($this->getReference('categorySchool'));
            $descriptionsChallengeSchool->setIsPicture($descriptionSchool[2]);
            $descriptionsChallengeSchool->setIsVideo($descriptionSchool[3]);
            $manager->persist($descriptionsChallengeSchool);
        }

        foreach ($descriptionsOrganization as $descriptionOrganization) {
            $descriptionsChallengeOrganization = new DescriptionChallenge();
            $descriptionsChallengeOrganization->setTitle($descriptionOrganization[0]);
            $descriptionsChallengeOrganization->setContent($descriptionOrganization[1]);
            $descriptionsChallengeOrganization->setCategory($this->getReference('categoryOrganization'));
            $descriptionsChallengeOrganization->setIsPicture($descriptionOrganization[2]);
            $descriptionsChallengeOrganization->setIsVideo($descriptionOrganization[3]);
            $manager->persist($descriptionsChallengeOrganization);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }

}
