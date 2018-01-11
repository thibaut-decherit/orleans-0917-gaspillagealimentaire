<?php
/**
 * Created by PhpStorm.
 * User: wilder5
 * Date: 10/01/18
 * Time: 10:04
 */

namespace AppBundle\DataFixture;

use AppBundle\Entity\AnswerQuizz;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AnswerQuizzFixture extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $answerQuizzs = [
            0 => [
                'Moins de 10 %',
                0,
                1,
            ],
            1 => [
                'Entre 10 et 30 %',
                0,
                1,
            ],
            2 => [
                'Plus de 30 %',
                1,
                1,
            ],
            3 => [
                'sont responsables de la majorité du gaspillage alimentaire',
                0,
                2,
            ],
            4 => [
                'sont exemplaires et ne gaspillent quasiment rien',
                0,
                2,
            ],
            5 => [
                'ont des critères esthétiques très rigoureux (calibrage des fruits et légumes, pas 
                de produits abîmés, rayons toujours pleins…) pour répondre aux exigences, réelles ou 
                supposées, des consommateurs qui sont responsables d\'une grande partie du gaspillage.',
                1,
                2,
            ],
            6 => [
                'La production (dans les champs)',
                0,
                3,
            ],
            7 => [
                'La transformation (dans l’industrie agro alimentaire)',
                0,
                3,
            ],
            8 => [
                'La distribution (marché et supermarchés)',
                0,
                3,
            ],
            9 => [
                'La consommation (maison, restaurant, cantines, …)',
                1,
                3,
            ],
            10 => [
                'Chaque acteur paye sa partie',
                0,
                4,
            ],
            11 => [
                'L\'Etat',
                0,
                4,
            ],
            12 => [
                'Les consommateurs',
                1,
                4,
            ],
            13 => [
                'Les citoyens',
                1,
                4,
            ],
            14 => [
                'donne des boutons',
                0,
                5,
            ],
            15 => [
                'est bon pour le morale',
                1,
                5,
            ],
            16 => [
                'rend beau !',
                0,
                5,
            ],
            17 => [
                '20 grammes',
                0,
                6,
            ],
            18 => [
                '160 grammes',
                0,
                6,
            ],
            19 => [
                '80 grammes',
                1,
                6,
            ],
            20 => [
                'Sur le châtaignier greffé',
                1,
                7,
            ],
            21 => [
                'Sur le châtaignier sauvage',
                0,
                7,
            ],
            22 => [
                'Sur le marronnier d\'Inde',
                0,
                7,
            ],
            23 => [
                'La citrouille',
                1,
                8,
            ],
            24 => [
                'Le potimarron',
                0,
                8,
            ],
            25 => [
                'Le pâtisson',
                0,
                8,
            ],
            26 => [
                'Le pâtisson',
                0,
                9,
            ],
            27 => [
                'Le potiron',
                0,
                9,
            ],
            28 => [
                'Le potimarron',
                1,
                9,
            ],
            29 => [
                'Le pâtisson',
                0,
                10,
            ],
            30 => [
                'Le potiron',
                1,
                10,
            ],
            31 => [
                'Le potimarron',
                0,
                10,
            ],
            32 => [
                'Les fruits de la passion',
                0,
                11,
            ],
            33 => [
                'Les grenades',
                0,
                11,
            ],
            34 => [
                'Les figues',
                1,
                11,
            ],
            35 => [
                'Les pistaches',
                0,
                12,
            ],
            36 => [
                'Les noisettes',
                1,
                12,
            ],
            37 => [
                'Les amandes',
                0,
                12,
            ],
            38 => [
                'La poire',
                0,
                13,
            ],
            39 => [
                'Le coing',
                1,
                13,
            ],
            40 => [
                'La pomme reinette',
                0,
                13,
            ],
            41 => [
                'Le pâtisson',
                1,
                14,
            ],
            42 => [
                'Le potimarron',
                0,
                14,
            ],
            43 => [
                'La citrouille',
                0,
                14,
            ],
            44 => [
                'L\'orange',
                0,
                15,
            ],
            45 => [
                'La bergamote',
                0,
                15,
            ],
            46 => [
                'La clémentine',
                1,
                15,
            ],
            47 => [
                'Le topinambour',
                1,
                16,
            ],
            48 => [
                'Le rutabaga',
                0,
                16,
            ],
            49 => [
                'Le panais',
                0,
                16,
            ],
            50 => [
                'La région dijonnaise',
                0,
                17,
            ],
            51 => [
                'La région grenobloise',
                1,
                17,
            ],
            52 => [
                'La région bordelaise',
                0,
                17,
            ],
            53 => [
                'Le kaki',
                1,
                18,
            ],
            54 => [
                'La pomme Cythère',
                0,
                18,
            ],
            55 => [
                'La papaye',
                0,
                18,
            ],
            56 => [
                'Le coing',
                0,
                19,
            ],
            57 => [
                'Le kiwi',
                1,
                19,
            ],
            58 => [
                'La nèfle',
                0,
                19,
            ],
            59 => [
                'oui',
                1,
                20,
            ],
            60 => [
                'non',
                0,
                20,
            ],
            61 => [
                'oui',
                1,
                21,
            ],
            62 => [
                'non',
                0,
                21,
            ],
            63 => [
                'oui',
                0,
                22,
            ],
            64 => [
                'non',
                0,
                22,
            ],
            65 => [
                '(ca dépends)',
                1,
                22,
            ],
            66 => [
                'Les produits dont la DLC (date limite de consommation) est dépassée',
                0,
                23,
            ],
            67 => [
                'Les produits qu’on a ouverts, consommé en parti et oublié au fond du frigo',
                0,
                23,
            ],
            68 => [
                'Les fruits et légumes',
                1,
                23,
            ],
            69 => [
                'Le pain',
                0,
                23,
            ],
            70 => [
                'Les restes de repas',
                1,
                23,
            ],
            71 => [
                'Moins de 10 kg,',
                0,
                24,
            ],
            72 => [
                'Entre 10 et 20 kg,',
                0,
                24,
            ],
            73 => [
                'Entre 20 et 30 kg,',
                0,
                24,
            ],
            74 => [
                'Plus de 30 kg,',
                1,
                24,
            ],
            75 => [
                'Moins de 50 kg',
                0,
                25,
            ],
            76 => [
                'Entre 50 et 70 kg',
                0,
                25,
            ],
            77 => [
                'Entre 70 et 90 kg',
                0,
                25,
            ],
            78 => [
                'Plus de 90 kg',
                1,
                25,
            ]
        ];

        foreach ($answerQuizzs as $answerQuizz) {
            $answerQuizzHome = new AnswerQuizz();
            $answerQuizzHome->setChoice($answerQuizz[0]);
            $answerQuizzHome->setIsTrue($answerQuizz[1]);
            $answerQuizzHome->setQuizzQuestion($this->getReference('question' . $answerQuizz[2]));
            $manager->persist($answerQuizzHome);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 5;
    }
}