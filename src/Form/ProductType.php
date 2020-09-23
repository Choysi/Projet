<?php

namespace App\Form;

use App\Entity\CategorieOeuvre;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('slug')
            ->add('image', VichImageType::class, [
                'delete_label' => 'Supprimer',
                // 'data_class' => NULL
            ])
            ->add('price')
            ->add('categorieOeuvre', EntityType::class, [
                'class' => CategorieOeuvre::class
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
