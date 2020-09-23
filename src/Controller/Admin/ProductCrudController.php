<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Entity\CategorieOeuvre;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $imageField = ImageField::new('imageFile')
            ->setFormType(VichImageType::class)
                ->setLabel('Image');

        $image = ImageField::new('image')
            ->setBasePath('/uploads/images')
                ->setLabel('Image');

        $fields = [
            IntegerField::new('id', 'Identifiant')->onlyOnIndex(),
            BooleanField::new('enabled', 'Disponible'),
            // AssociationField::new('categorieOeuvre', 'Type de categorie'),
            TextField::new('title', 'Titre'),
            DateTimeField::new('created', 'Création'),
            DateTimeField::new('updated')->onlyOnIndex(),
            MoneyField::new('price', 'prix')->setCurrency('EUR'),
            IntegerField::new('quantity', 'Quantité'),
            TextField::new('slug', 'Mot clé'),
        ];

        if ($pageName === Crud::PAGE_INDEX || $pageName === Crud::PAGE_DETAIL) {
            $fields[] = $image;
        } else {
            $fields[] = $imageField;
        }

        return $fields;
    }
    
}
