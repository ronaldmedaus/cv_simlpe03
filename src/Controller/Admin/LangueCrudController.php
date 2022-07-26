<?php

namespace App\Controller\Admin;

use App\Entity\Langue;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LangueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Langue::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new('level'),
        ];
    }
}
