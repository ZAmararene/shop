<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nommez votre adresse*',
                'attr' => [
                    'placeholder' => 'Quel nom souhaitez-vous donner à votre adresse ?'
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom*',
                'attr' => [
                    'placeholder' => 'Votre prénom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom*',
                'attr' => [
                    'placeholder' => 'Votre nom'
                ]
            ])
            ->add('company', TextType::class, [
                'label' => 'Société',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Votre société (facultatif)'
                ]
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresse*',
                'attr' => [
                    'placeholder' => '111 rue de Rennes'
                ]
            ])
            ->add('postal', TextType::class, [
                'label' => 'Code postal*',
                'attr' => [
                    'placeholder' => 'Votre code postal'
                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville*',
                'attr' => [
                    'placeholder' => 'Votre ville'
                ]
            ])
            ->add('country', CountryType::class, [
                'label' => 'Pays*',
                'attr' => [
                    'class' => 'd-block'
                ]
            ])
            ->add('phone', TelType::class, [
                'label' => 'Téléphone*',
                'attr' => [
                    'placeholder' => 'Votre téléphone'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider',
                'attr' => [
                    'class' => 'btn-block btn-secondary'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
