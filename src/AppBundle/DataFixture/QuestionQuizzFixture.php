<?php
/**
 * Created by PhpStorm.
 * User: wilder5
 * Date: 10/01/18
 * Time: 09:45
 */

namespace AppBundle\DataFixture;

use AppBundle\Entity\QuestionQuizz;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class QuestionQuizzFixture extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $questionQuizzs = [
            0 => [
                'Du champ à l’assiette, quelle part de la nourriture est perdue ou gaspillée ?',
                1,
                1,
                'environ 1/3 d’après la FAO.',
                'images/quizzImages/Alimentation/q1.jpg',
            ],
            1 => [
                'Mais la grande distribution dans tout ça ? Les grandes surfaces…',
                1,
                2,
                'D’après les chiffres disponibles actuellement, l’ensemble des gaspillages des
                 ménages est supérieur à celui des grandes surfaces. Cela n’enlève rien au caractère
                 scandaleux de ce qui est jeté par la grande distribution mais nos modes de consommation y
                 sont pour beaucoup…',
                'images/quizzImages/Alimentation/q2.jpg',
            ],
            2 => [
                'A quelle étape de la chaine alimentaire le gaspillage est-il le plus important ?',
                1,
                3,
                'Dans nos pays du Nord, la plus grande partie du gaspillage a lieu à la
                consommation',
                'images/quizzImages/Alimentation/q3.png',
            ],
            3 => [
                'Qui paye le gaspillage au final ?',
                1,
                4,
                'Les consommateurs et les citoyens.
                 Les consommateurs car quand j’achète une tomate, je paye aussi pour celles qui ont été
                 laissées dans le champ et celles qui, abimées, ont été jetées à Rungis ou au supermarché. (Le
                 coût des autres est intégré dans le prix de vente de celles qui restent)
                 Et les citoyens car le gaspillage alimentaire c’est 10% du poids des poubelles dont le coût de
                 la gestion (collecte avec les camions et traitement en centre d’enfouissement ou à
                 l’incinérateur) est supporté par tous.',
                'images/quizzImages/Alimentation/q4.png',
            ],
            4 => [
                'A ton avis, le chocolat…',
                1,
                5,
                'Le chocolat réduit le stress et améliore l’humeur chez les
                personnes dont le moral est bas, mais cet effet est très éphémère. Le cacao
                renferme des centaines de molécules susceptibles d’agir sur le comportement.
                Caféine, théobromine, théophylline sont des substances toniques qui vous
                mettent en forme. Magnésium contre le stress. Et surtout de la
                phényléthylamine, véritable antidépresseur végétal qui donne un meilleur moral.',
                'images/quizzImages/Alimentation/q5.jpg',
            ],
            5 => [
                'Il est recommandé de consommer 5 fruits et légumes par jour en France. Mais une portion de
                fruits et légumes, c’est quoi ?',
                1,
                6,
                '80 grammes : Une portion, c’est environ 80g de fruits ou légumes soit à peu près la taille
                d’un poing. Consommer 5 portions, c’est consommer 400 grammes de fruits ou de légumes, ce qui
                est recommandé par l’OMS (Organisation mondiale de la santé)',
                'images/quizzImages/Alimentation/q6.jpg',
            ],
            6 => [
                'Chauds, ou en crème, vous les appréciez ! On les appelle marrons ! Mais sur quel arbre poussent les marrons comestibles ?',
                2,
                1,
                'Le châtaignier greffé. Les fruits du marronnier ne sont pas comestibles, ce sont les marrons d\'Inde.
                Ce que nous appelons "marron" est issu du châtaignier.
                Le châtaignier sauvage produit des châtaignes.
                À Noël, on mange de la dinde aux marrons. Le reste de l\'année, on peut déguster de la crème de marrons, des marrons chauds, des marrons glacés. Pourtant, au sens botanique du terme, ce fruit n\'est pas comestible. Ainsi, ce que l\'on appelle communément « marron » dans la langue française est en réalité une grosse châtaigne, dont l\'aspect est tout de même un peu différent de la châtaigne sauvage. ',
                'images/quizzImages/Saisonnalite/q1.jpg',
            ],
            7 => [
                'Quel est ce gros fruit orangé, qui peut peser jusqu\'à 5 kg, et qui nous est familier, dès novembre ?',
                2,
                2,
                'La citrouille. Reine d\'Halloween',
                'images/quizzImages/Saisonnalite/q2.jpg',
            ],
            8 => [
                'De la même famille, mais en forme de poire, quel est celui-ci ?',
                2,
                3,
                'Le potimarron. A la saveur des châtaignes.',
                'images/quizzImages/Saisonnalite/q3.jpg',
            ],
            9 => [
                'Quelle est cette variété de courge un peu aplatie dont la couleur va d\'un orange rougeâtre au vert foncé ?',
                2,
                4,
                'Le potiron. Ne pas confondre avec la citrouille qui est plus ronde.',
                'images/quizzImages/Saisonnalite/q4.jpg',
            ],
            10 => [
                'La fin d\'été est aussi l\'époque de cueillir ces fruits !',
                2,
                5,
                'Les figues. Les figues fraîches.',
                'images/quizzImages/Saisonnalite/q5.jpg',
            ],
            11 => [
                'Que sont ces fruits, rois de l\'automne ?',
                2,
                6,
                'Les noisettes. Régal des écureuils !',
                'images/quizzImages/Saisonnalite/q6.jpg',
            ],
            12 => [
                'Encore un fruit, bien de saison !',
                2,
                7,
                'Le coing. Pour faire vos pâtes de fruits.',
                'images/quizzImages/Saisonnalite/q7.jpg',
            ],
            13 => [
                'Quel est ce cucurbitacé, de forme aplatie, circulaire, plus ou moins conique, avec des bosses ?',
                2,
                8,
                'La pâtisson. Se récolte en début d\'automne.',
                'images/quizzImages/Saisonnalite/q8.jpg',
            ],
            14 => [
                'Quel est ce fruit porté par un arbre issu du croisement d\'un bigaradier et d\'un mandarinier ?',
                2,
                9,
                'La clémentine. Fruit du Clémentinier.',
                'images/quizzImages/Saisonnalite/q9.jpg',
            ],
            15 => [
                'Voici encore un légume rustique, et de saison :',
                2,
                10,
                'Le topinambour. Nommé aussi artichaut de Jérusalem.',
                'images/quizzImages/Saisonnalite/q10.jpg',
            ],
            16 => [
                'Quelle région est réputée pour la récolte de ce fruit en grande quantité ?',
                2,
                11,
                'La région grenobloise. La noix de Grenoble.',
                'images/quizzImages/Saisonnalite/q11.jpg',
            ],
            17 => [
                'Quel est ce fruit qui pousse sur le plaqueminier dans le Midi, dès septembre ?',
                2,
                12,
                'Le kaki. Aussi appelé plaquemine de Corée, plaquemine de Chine.
                Il est inutile d\'aller aussi loin pour en trouver. On en voit souvent dans le Midi de la France.',
                'images/quizzImages/Saisonnalite/q12.jpg',
            ],
            18 => [
                'Ce fruit a besoin d\'un climat doux en hiver et chaud en été. On le récolte à l\'automne :',
                2,
                13,
                'Le kiwi. Pousse aussi en France.',
                'images/quizzImages/Saisonnalite/q13.jpg',
            ],
            19 => [
                'Quand je jette une tomate abimée au compost, est-ce du gaspillage ?',
                3,
                1,
                'Oui, en effet même cela est plus responsable que de la jeter à la poubelle, cette tomate a été produite dans le but d\'être consommée.',
                'images/quizzImages/Impact/q1.jpg',
            ],
            20 => [
                'Quand je donne le reste de viande au chien, est-ce du gaspillage ?',
                3,
                2,
                'Et oui ! Car on considère que le gaspillage alimentaire c’est toute nourriture
                destinée à l’alimentation humaine qui ne l’est pas au final… Par contre restons logique,
                mieux vaut la composter ou la donner aux animaux que de la jeter à la poubelle !',
                'images/quizzImages/Impact/q2.jpg',
            ],
            21 => [
                'Et les croutes du fromage ou du pain, le gras de la viande ou bien les épluchures
                des fruits et légumes, est-ce du gaspillage ?',
                3,
                3,
                'En effet, ça dépend des personnes. C’est ce que l’on considère comme du
                gaspillage potentiellement évitable (1/5 du gaspillage). Par contre il existe plein d’astuces pour cuisiner comme un chef ses restes de repas, faire un bouillon ou un fond de sauce avec
                une carcasse de volaille ou des gratins délicieux avec des légumes un peu flétris.',
                'images/quizzImages/Impact/q3.png',
            ],
            22 => [
                'Savez-vous ce qui est jeté en priorité ?',
                3,
                4,
                'Restes de repas et fruits et légumes ex aequo (1/4 chacun du gaspillage
                alimentaire des ménages), ensuite les produits emballés mais en partie consommés (1/5), le
                pain (14%) puis les produits emballés jetés sans être ouverts (13%).',
                'images/quizzImages/Impact/q4.png',
            ],
            23 => [
                'Savez-vous quelle est, par français, la quantité moyenne de nourriture jetée chaque
                année à la maison ?',
                3,
                5,
                'A priori plus de 40 kg ! (Source : FNE/Verdicité)',
                'images/quizzImages/Impact/q5.png',
            ],
            24 => [
                'Et si on compte l’ensemble du gaspillage à la consommation, c\'est-à-dire en
                comptant en plus des maisons : les restaurants, les cantines (scolaires ou
                d’entreprises), les pique-niques et repas du midi au bureau. Quelle quantité
                atteint-on (par an et par personne) ?',
                3,
                6,
                'Environ 95 kg ! (Source : FAO (Food and Alimentation Organisation) qui dépend de
                l’ONU)',
                'images/quizzImages/Impact/q6.png',
            ],
            25 => [
                'Quelle vitamine est fabriqué à l\'intérieur du corps ?',
                4,
                1,
                'La vitamine D, elle est synthétisée au contact des rayons du soleil sur la peau.',
                'images/quizzImages/Nutrition/Q1.png',
            ],
            26 => [
                'Dans quel type d\'aliment trouve-t-on les vitamines C ?',
                4,
                2,
                'Dans les fruits crus et certains légumes crus, lorsque qu\'ils sont cuit il y a une perte en vitamine. Les
vitamines C sont dîtes Thermolabiles.',
                'images/quizzImages/Nutrition/Q2.png',
            ],
            27 => [
                'Dans lequel de ces fruits trouve-t-on le plus de vitamines C pour un même poids de fruit consommé ?',
                4,
                3,
                'Les cassis, avec 180mg de vitamines C pour 100 grammes de cassis consommés. Vient ensuite
le kiwi avec 80mg/100g, l\'orange avec 50mg/100g et la pomme avec 10mg/100g.',
                'images/quizzImages/Nutrition/Q3.png',
            ],
            28 => [
                'La vitamine C est-elle mieux absorbée par le corps humain à partir de suppléments alimentaires ou
d\'aliments ?',
                4,
                4,
                'à partir des aliments, du à un effet entre les aliments et d’autres éléments présents dans les
fruits, la vitamine C présente sera absorbé en plus grande quantité.',
                'images/quizzImages/Nutrition/Q4.png',
            ],
            29 => [
                'Les protéines présentent dans un œuf sont absorbées par la corps à :',
                4,
                5,
                '100% Mais attention cela ne signifie pas qu\'un œuf est composé à 100% de protéines.',
                'images/quizzImages/Nutrition/Q5.png',
            ],
            30 => [
                'La proportion conseillée de Glucides par jour se situe:',
                4,
                6,
                'Entre 50 et 55% les reste étant composé de 35 à 40% de lipides et 15% de protéines.',
                'images/quizzImages/Nutrition/Q6.png',
            ],
            31 => [
                'Au cour d\'un effort prolongé, l\'énergie fournie aux muscles vient :',
                4,
                7,
                'Les lipides permettent d\'alimenter les muscles pour des efforts prolongés. Pour des effort de 20
secondes en moyenne, l\'énergie provient des glucides.',
                'images/quizzImages/Nutrition/Q7.png',
            ]
        ];
        $i = 0;
        foreach ($questionQuizzs as $questionQuizz) {
            $i++;
            $questionQuizzHome = new QuestionQuizz();
            $questionQuizzHome->setTitle($questionQuizz[0]);
            $questionQuizzHome->setTitleQuizz($this->getReference('title' . $questionQuizz[1]));
            $questionQuizzHome->setQuestionNbr($questionQuizz[2]);
            $questionQuizzHome->setTip($questionQuizz[3]);
            $questionQuizzHome->setImgQuizz($questionQuizz[4]);
            $this->addReference('question' . $i, $questionQuizzHome);
            $manager->persist($questionQuizzHome);

        }
        $manager->flush();


    }

    public function getOrder()
    {
        return 4;
    }
}

