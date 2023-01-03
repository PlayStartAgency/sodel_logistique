<?php

namespace App\Controller\Admin;

use App\Entity\Orders;
use App\Entity\Fournisseurs;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use phpDocumentor\Reflection\Types\Boolean;

class OrdersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Orders::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           
            NumberField::new('numero de commande'),
            ArrayField::new('fournisseur'),
            DateTimeField::new('date_cmd'),
            DateTimeField::new('date_rcp'),
            TextField::new('article'),
            TextField::new('designation'),
            NumberField::new('qte_cmd_uom'),
            NumberField::new('unite_cmd'),
        ];
    }
    
}
