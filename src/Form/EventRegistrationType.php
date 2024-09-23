<?php

namespace App\Form;

use App\Entity\Attendant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('birthdate', null, [
                'widget' => 'single_text',
            ])
            ->add('address')
            ->add('email')
            ->add('phone')
            ->add('cableNeeded')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Attendant::class,
        ]);
    }
}
