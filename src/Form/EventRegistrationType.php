<?php

namespace App\Form;

use App\Entity\Attendant;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EventRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'Prenom',
                'constraints' => [
                    new Assert\NotBlank(['message' => 'First name can not be blank'])
                ]
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nom',
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Name can not be blank'])
                ]
            ])
            ->add('birthdate', DateType::class, [
                'label' => 'Date de naissance',
                'widget' => 'single_text',
                'input'  => 'datetime_immutable',
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Birth date required.']),
                ]
            ])
            ->add('street', TextType::class, [
                'label' => 'Numero et Rue'
            ])
            ->add('postcode', TextType::class, [
                'label' => 'Code postal'
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville'
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Please provide an e-mail address']),
                    new Assert\Email(['message' => 'Please provide a valid e-mail address.'])
                ]
            ])
            ->add('phone', TextType::class, [
                'label' => 'Telephone'
            ])
            ->add('cableNeeded', CheckboxType::class, [
                'label' => 'J\'ai besoin que l\'on me prete un cable reseau.',
                'label_attr' => [
                    'class' => 'label-checkbox'
                ],
                'required' => false
            ])
            ->add('send', SubmitType::class, [
                'label' => 'S\'enregistrer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Attendant::class,
        ]);
    }
}
