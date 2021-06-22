<?php

namespace App\Controller\Admin;

use App\Entity\AnswerOption;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AnswerOptionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AnswerOption::class;
    }


/*    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            //TextField::new('name'),
            AssociationField::new("questionOption"),
            CollectionField::new("answerOption"),

        ];
    }*/

}
