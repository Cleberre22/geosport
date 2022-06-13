<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Sport;
use App\Controller\Admin\UserCrudController;
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
            ->setTitle('Geosport');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Sport');

        yield MenuItem::subMenu('Action', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Add sport', 'fas fa-plus', Sport::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show sport', 'fas fa-eye', Sport::class)
        ]);

        yield MenuItem::subMenu('Action', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Add sport', 'fas fa-plus', Sport::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show sport', 'fas fa-eye', Sport::class)
        ]);
       
    }
}
