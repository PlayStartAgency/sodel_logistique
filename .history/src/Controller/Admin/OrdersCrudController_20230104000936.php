<?php

namespace App\Controller\Admin;

use App\Entity\Orders;
use App\Entity\Fournisseurs;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
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
            IdField::new('id')->hideOnForm(),
            NumberField::new('numero_cmd'),
           AssociationField::new('fournisseur'),
            DateTimeField::new('date_cmd'),
            DateTimeField::new('Date_rcp'),
            TextField::new('article'),
            TextField::new('designation'),
            NumberField::new('qte_cmd_uom'),
            NumberField::new('unite_cmd'),
        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof Orders) return;

        $entityInstance->setDate_rcp(new \DateTimeImmutable);

        parent::persistEntity($em, $entityInstance);

    }
    
}
