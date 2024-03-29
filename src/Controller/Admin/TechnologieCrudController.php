<?php

namespace App\Controller\Admin;

use App\Entity\Technologie;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TechnologieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Technologie::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
        ];
    }
}
