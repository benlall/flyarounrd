<?php

namespace AppBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReviewType extends AbstractType
{

    /**
    * {@inheritdoc} Including all fields from Review entity.
    */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    $builder
    ->add('text', TextareaType::class, array('attr' => array('maxlenght' => 250, 'label' => 'Description')))
    ->add('publicationDate', DateType::class, array('data' => new \DateTime('now')))
    ->add('note', IntegerType::class, array('attr' => array('min' => 0, 'max' => 5, 'label'=> 'Note')))
    ->add('agreeTerms', CheckboxType::class, array('mapped' => false)) // mapped => false necessaire car le champ agreeTerms ne figure pas ds la table
    ->add('userRated', EntityType::class, array('class' => 'AppBundle\Entity\User', 'query_builder' => function(EntityRepository $er) {
        return $er->createQueryBuilder('u')->orderBy('u.phoneNumber', 'ASC');
        },
            'choice_label' => 'phoneNumber'))
    ->add('reviewAuthor');
    }

    /**
     * {@inheritdoc} Targeting Review entity
     */

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class' => 'AppBundle\Entity\Review'
        ));
    }

    /**
     * {@inheritdoc} getName() is now deprecated
     */

    public function getBlockPrefix()
    {
        return 'appbundle_review';
    }
}
