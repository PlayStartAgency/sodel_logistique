<?php

namespace App\Controller\Admin;

use App\Entity\Fournisseurs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FournisseursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Fournisseurs::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           
           /* TextField::new('fournisseur_name'),*/
             TextField::new('rcs'),
            EmailField::new('Email'),
            TelephoneField::new('tel'),
            TextField::new('adresse'),
            TextField::new('cp'),
            TextField::new('ville'),
            
        ];
    }
    
}
