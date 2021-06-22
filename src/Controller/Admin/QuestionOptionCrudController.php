<?php

namespace App\Controller\Admin;

use App\Entity\QuestionOption;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class QuestionOptionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return QuestionOption::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new("img"),
            AssociationField::new('question')
        ];
    }

}
