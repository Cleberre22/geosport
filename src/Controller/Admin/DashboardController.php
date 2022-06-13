<?php

namespace App\Controller\Admin;

use App\Entity\Club;
use App\Entity\Team;
use App\Entity\User;
use App\Entity\Sport;
use App\Entity\Championship;
use App\Controller\Admin\UserCrudController;
use App\Entity\Stadium;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ) {
    }


    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(UserCrudController::class)
            ->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Geosport Administration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Utilisateur');
        yield MenuItem::subMenu('', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter un utilisateur', 'fas fa-plus', User::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les utilisateurs', 'fas fa-eye', User::class)
        ]);

        yield MenuItem::section('Sport');
        yield MenuItem::subMenu('', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter sport', 'fas fa-plus', Sport::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les sports', 'fas fa-eye', Sport::class)
        ]);

        yield MenuItem::section('Club');
        yield MenuItem::subMenu('', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter un club', 'fas fa-plus', Club::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les clubs', 'fas fa-eye', Club::class)
        ]);

        yield MenuItem::section('Championnat');
        yield MenuItem::subMenu('', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter un championnat', 'fas fa-plus', Championship::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les championnats', 'fas fa-eye', Championship::class)
        ]);

        yield MenuItem::section('Équipe');
        yield MenuItem::subMenu('', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter une équipe', 'fas fa-plus', Team::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les équipes', 'fas fa-eye', Team::class)
        ]);

        yield MenuItem::section('Stade');
        yield MenuItem::subMenu('', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter un stade', 'fas fa-plus', Stadium::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les stades', 'fas fa-eye', Stadium::class)
        ]);
       
    }
}
