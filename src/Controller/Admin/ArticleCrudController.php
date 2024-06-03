<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextField::new('description'),
            TextEditorField::new('content'),
            AssociationField::new('authorId', 'Author')->setFormTypeOptions([
                'choice_label' => 'firstName',
            ]),
            AssociationField::new('tagId', 'Tag')->setFormTypeOptions([
                'choice_label' => 'tagName'
            ]),
            TextField::new('status'),
            AssociationField::new('fileId'),
            
        ];
    }
    
}
