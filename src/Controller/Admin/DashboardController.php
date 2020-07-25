<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\User;
use App\Entity\Auteur;
use App\Entity\Genre;
use App\Entity\Editeur;
use App\Entity\Fournisseur;
use App\Entity\Produit;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('My Project Dashboard');
    }

    public function configureMenuItems(): iterable
    {
        return [
        // MenuItem::linktoDashboard('Accueil', 'fa fa-home'),
        MenuItem::linkToUrl('Accueil', 'fa fa-home', '/'),
        MenuItem::linkToCrud('Utilisateurs', 'fa fa-tags', User::class),
        MenuItem::section('Mes BD'),
            MenuItem::linkToCrud('Produits', 'fa fa-tags', Produit::class),
            MenuItem::linkToCrud('Auteurs', 'fa fa-tags', Auteur::class),
            MenuItem::linkToCrud('Genres', 'fa fa-tags', Genre::class),
            MenuItem::linkToCrud('Editeurs', 'fa fa-tags', Editeur::class),
            MenuItem::linkToCrud('Fournisseurs', 'fa fa-tags', Fournisseur::class)
        ];
    }

}
