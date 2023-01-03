<?php

namespace App\Controller\Admin;

use App\Entity\Orders;
use App\Entity\Fournisseurs;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OrdersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Orders::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           
            string::new('numero_cmd'),
            int::new('fournisseur'),
            DateTime::new('date_cmd'),
            DateTime::new('date_rcp'),
            string::new('article'),
            string::new('designation'),
            string::new('fournisseur'),
        ];
    }
    
}
