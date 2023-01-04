<?php

namespace App\Controller\Admin;

use App\Entity\Fournisseurs;
use App\Entity\Orders;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Dto\LocaleDto;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use  EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
        
    }
    #[Route('/', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->
        setController(OrdersCrudController::class)
        ->generateUrl();
        
        return $this->redirect($url);

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Sodel Logistique')
            ->renderContentMaximized()
            ->setLocales(['fr', 'en'])
            ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Acceuil' ,'fa fa-home');
        yield MenuItem::linkToCrud('Passer une Commande', 'fas fa-plus', Orders::class)->setAction(Crud::PAGE_NEW);
        yield MenuItem::linkToCrud('Liste des Commandes', 'fas fa-list', Orders::class);
        yield MenuItem::linkToCrud('Liste des Fournisseurs', 'fas fa-address-book',Fournisseurs::class);
        yield MenuItem::linkToCrud('Ajouter un Fournisseurs', 'fas fa-user-plus',Fournisseurs::class)->setAction(Crud::PAGE_NEW);
    }
}
