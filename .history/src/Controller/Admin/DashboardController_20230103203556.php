<?php

namespace App\Controller\Admin;

use App\Entity\Fournisseurs;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use  EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
        
    }
    #[Route('/admin', name: 'admin')]
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
            ->setTitle('Sodel Logistique');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Acceuil' ,'fa fa-home');
        yield MenuItem::linkToDashboard('Passer une Commande' ,'fa fa-shop' Orders::class)->setAction(Crud::Page_NEW);
        yield MenuItem::linkToDashboard('Liste des Commandes' ,'fa fa-list');
        yield MenuItem::linkToDashboard('Statuer une Commande' ,'fa fa-spinner');
        yield MenuItem::linkToDashboard('Liste des fournisseurs' ,'fa fa-handshake', Fournisseurs::class)->setAction(Crud::Page_NEW);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
