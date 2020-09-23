<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', TextType::class, [
                'attr' => ['class' => 'uk-input']
            ])
            ->add('pseudo', TextType::class, [
                'attr' => ['class' => 'uk-input']
            ])
            // ->add('dateNaissance', DateType::class, [
            //     'years' => range(date('Y'), date('Y') - 70),
            //     'label' => 'Date de naissance',
            //     'format' => 'ddMMyyyy'
            // ])
            ->add('password', PasswordType::class, [
                'attr' => ['class' => 'uk-input']
            ])
            // ->add('cp', TextType::class, [
            //     'attr' => ['class' => 'uk-input']
            // ])
            // ->add('ville', TextType::class, [
            //     'attr' => ['class' => 'uk-input']
            // ])
            // ->add('dateEmbauche', DateType::class, [
            //     'years' => range(date('Y'), date('Y') - 70),
            //     'label' => 'Date d\'embauche',
            //     'format' => 'ddMMyyyy'
            // ])
            // ->add('entreprise', EntityType::class, [
            //     'class' => Entreprise::class,
            //     'choice_label' => 'raisonSociale',
            //     'attr' => ['class' => 'uk-select']
            // ])
            // ->add('nombreDenfants', IntegerType::class, [
            //     'attr' => [
            //         'min'  => 0,
            //         'max'  => 20,
            //         'step' => 1
            //     ]
            // ])
            ->add('Valider', SubmitType::class, [
                'attr' => ['class' => 'uk-button uk-button-primary uk-margin-top']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
