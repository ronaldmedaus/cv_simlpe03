<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Langue;
use App\Entity\Loisir;
use App\Entity\Formation;
use App\Entity\Portfolio;
use App\Entity\Competence;
use App\Entity\Experience;
use App\Entity\Technologie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Portfolio');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Formations', 'fas fa-building-flag', Formation::class);
        yield MenuItem::linkToCrud('Technologies', 'fas fa-gauge-high', Technologie::class);
        yield MenuItem::linkToCrud('Expériences', 'fas fa-vial', Experience::class);
        yield MenuItem::linkToCrud('Compétences', 'fas fa-chart-line', Competence::class);
        yield MenuItem::linkToCrud('Langues', 'fas fa-language', Langue::class);
        yield MenuItem::linkToCrud('Loisir', 'fas fa-calendar-check', Loisir::class);
        yield MenuItem::linkToCrud('Portfolio', 'fas fa-address-book', Portfolio::class);
    }
}
