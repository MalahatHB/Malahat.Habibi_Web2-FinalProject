<?php

namespace App\Controller\Admin;

use App\Entity\PharmacyType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PharmacyTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PharmacyType::class;
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
