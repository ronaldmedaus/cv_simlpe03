<?php

namespace App\Controller\Admin;

use App\Entity\Loisir;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LoisirCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Loisir::class;
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
