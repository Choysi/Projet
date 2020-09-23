<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function createEntity(string $entityFqcn)
    {
        $article = new Article();
        $article->setAuthor($this->getUser());

        return $article;
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
            IdField::new('id')->onlyOnIndex(),
            TextField::new('title', 'Titre'),
            TextareaField::new('content', 'Contenu'),
        ];

        if ($pageName === Crud::PAGE_INDEX || $pageName === Crud::PAGE_DETAIL) {
            $fields[] = $image;
        } else {
            $fields[] = $imageField;
        }

        return $fields;
    }
}
