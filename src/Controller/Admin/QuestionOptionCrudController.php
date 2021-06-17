<?php

namespace App\Controller\Admin;

use App\Entity\QuestionOption;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class QuestionOptionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return QuestionOption::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
