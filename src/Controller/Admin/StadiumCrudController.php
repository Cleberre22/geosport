<?php

namespace App\Controller\Admin;

use App\Entity\Stadium;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class StadiumCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Stadium::class;
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
