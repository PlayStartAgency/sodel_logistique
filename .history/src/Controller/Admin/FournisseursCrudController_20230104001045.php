<?php

namespace App\Controller\Admin;

use App\Entity\Fournisseurs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
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
            IdField::new('id')->hideOnForm(),
            TextField::new('name_sct'),
            TextField::new('rcs'),
            EmailField::new('Email'),
            TelephoneField::new('tel'),
            TextField::new('adresse'),
            TextField::new('cp'),
            TextField::new('ville')->setRequired(true),
            
        ];
    }
    /*public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof Fournisseurs) return;

        $entityInstance->setName_sct(new \TextFiel);

        parent::persistEntity($em, $entityInstance);

    }*/
    
}
}
