<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class InformMenuType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label' => "Nom du lien (qui apparaîtra dans le menu)",
                'label_attr' => array('class' => 'labels_admin')
            ))
            ->add('type', TextType::class, array(
                'label' => "Type de la ressource (site internet, article de blog...)",
                'label_attr' => array('class' => 'labels_admin')
            ))
            ->add('summary', TextareaType::class, array(
                'label' => "Résumé de la ressource",
                'label_attr' => array('class' => 'labels_admin'),
                'attr' => array(
                    'class' => 'textfield',
                    'rows' => '5'
                )
            ))
            ->add('link', UrlType ::class, array(
                'label' => "Url du lien",
                'label_attr' => array('class' => 'labels_admin')
            ))
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => false,
                'download_uri' => false,
                'image_uri' => false,
            ])
            ->add('isMenu', CheckboxType::class, array(
                'label' => "A cocher pour que le lien apparaisse dans le menu",
                'required' => false,
                'label_attr' => array('class' => 'labels_admin')
            ));

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\InformMenu'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_informMenu';
    }


}
