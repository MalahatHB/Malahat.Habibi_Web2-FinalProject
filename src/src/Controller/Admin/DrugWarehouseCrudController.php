<?php

namespace App\Controller\Admin;

use App\Entity\DrugWarehouse;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DrugWarehouseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DrugWarehouse::class;
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
