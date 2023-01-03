<?php

namespace App\Controller\Admin;

use App\Entity\Fournisseurs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FournisseursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Fournisseurs::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           
            TextField::new('fournisseur_name'),
            
        ];
    }
    
}
