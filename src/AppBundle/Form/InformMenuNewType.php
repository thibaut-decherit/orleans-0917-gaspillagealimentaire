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

class InformMenuNewType extends AbstractType
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
            ->add('type', TextType::class, array(
                'label' => "Type (site internet, article de blog...)",
                'required' => true,
                'label_attr' => array('class' => 'labels_admin')
            ))
            ->add('summary', TextareaType::class, array(
                'label' => "Résumé",
                'required' => true,
                'label_attr' => array('class' => 'labels_admin'),
                'attr' => array(
                    'class' => 'textfield',
                    'rows' => '5'
                )
            ))
            ->add('link', UrlType ::class, array(
                'label' => "Url",
                'required' => true,
                'label_attr' => array('class' => 'labels_admin')
            ))
            ->add('imageFile', VichImageType::class, [
                'label' => "Image",
                'label_attr' => array('class' => 'labels_admin'),
                'required' => true,
                'allow_delete' => false,
                'download_uri' => false,
                'image_uri' => false,
            ]);
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
