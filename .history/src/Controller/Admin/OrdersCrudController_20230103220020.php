<?php

namespace App\Controller\Admin;

use App\Entity\Orders;
use App\Entity\Fournisseurs;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

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
            DateTimeField::new('date_cmd'),
            DateTimeField::new('date_rcp'),
            string::new('article'),
            string::new('designation'),
            string::new('qte_cmd_uom'),
            string::new('unite_cmd'),
        ];
    }
    
}
