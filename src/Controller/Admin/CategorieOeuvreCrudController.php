<?php

namespace App\Controller\Admin;

use App\Entity\CategorieOeuvre;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategorieOeuvreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CategorieOeuvre::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Product %entity_label_singular%')
            ->setSearchFields(['id', 'name']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield IntegerField::new('id', 'ID')->hideOnForm();
        yield TextField::new('name');
        yield AssociationField::new('products')->hideOnForm();
    }
}
