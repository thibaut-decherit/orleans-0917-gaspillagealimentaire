<?php

namespace AppBundle\Form;

use AppBundle\Entity\ResourceTheme;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ResourceNewType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label' => "Nom",
                'required' => true,
                'label_attr' => array('class' => 'labels_admin')
            ))
            ->add('resourcetheme', EntityType::class, [
                'class' => ResourceTheme::class,
                'choice_label' => 'name',
                'label' => 'Thème',
                'label_attr' => array('class' => 'labels_admin')
            ])
            ->add('description', TextareaType::class, array(
                'label' => "Résumé",
                'required' => true,
                'label_attr' => array('class' => 'labels_admin'),
                'attr' => array(
                    'class' => 'textfield',
                    'rows' => '5'
                )
            ))
            ->add('resourceFile', VichImageType::class, [
                'label' => "Ressource",
                'label_attr' => array('class' => 'labels_admin'),
                'required' => true,
                'allow_delete' => false,
                'download_uri' => false,
                'image_uri' => false,
                'constraints' => array(
                    new NotBlank([
                        'message' => 'Vous devez envoyer une ressource.'
                    ]),
                ),
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Resource'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_resource';
    }


}
