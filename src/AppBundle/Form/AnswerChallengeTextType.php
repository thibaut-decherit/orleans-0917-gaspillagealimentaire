<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 08/01/18
 * Time: 14:43
 */

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnswerChallengeTextType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => "Ton nom :",
                'required' => true,
                'label_attr' => array('class' => 'labels_admin')
            ))
            ->add('title', TextType::class, array(
                'label' => "Titre de ton message (nom de ta recette, d'un évènement, etc) :",
                'required' => true,
                'label_attr' => array('class' => 'labels_admin')
            ))
            ->add('message', TextareaType::class, array(
                'label' => "Ton message :",
                'required' => true,
                'label_attr' => array('class' => 'labels_admin'),
                'attr' => array('rows' => '10')
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\AnswerChallenge'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_answerchallenge';
    }

}