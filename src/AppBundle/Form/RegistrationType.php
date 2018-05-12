<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{

    /**
    * {@inheritdoc} Including all fields from Review entity.
    */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    $builder
        ->add('firstName')
        ->add('lastName')
        ->add('phoneNumber')
        ->add('birthDate')
        ->add('isACertifiedPilot');
    }

    /**
     * {@inheritdoc} Targeting User entity
     */

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class' => 'AppBundle\Entity\User'
        ));
    }


    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    /**
     * {@inheritdoc} getName() is now deprecated
     */

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }
}
