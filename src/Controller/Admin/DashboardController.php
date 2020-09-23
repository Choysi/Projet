<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\CategorieOeuvre;
use App\Entity\Prestation;
use App\Entity\Product;
use App\Entity\User;
use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use App\Repository\PrestationRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
protected $userRepository;
protected $productRepository;
protected $prestationRepository;
protected $articleRepository;
protected $commentRepository;

    public function __construct(
       UserRepository $userRepository,
       ProductRepository $productRepository,
       PrestationRepository $prestationRepository,
       ArticleRepository $articleRepository,
       CommentRepository $commentRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->prestationRepository = $prestationRepository;
        $this->articleRepository = $articleRepository;
        $this->commentRepository = $commentRepository;
    }
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('bundles/EasyAdminBundle/welcome.html.twig', [
            'countAllUser' => $this->userRepository->countAllUser(),
            'countAllProduct' => $this->productRepository->countAllProduct(),
            'countAllPrestation' => $this->prestationRepository->countAllPrestation(),
            'article' => $this->articleRepository->findALL()

    ]);

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('SiteSylvain');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            MenuItem::LinkToCrud('Utilisateurs', 'fa fa-users', User::class),
            MenuItem::linkToCrud('Produits', 'fas fa-palette', Product::class),
            // MenuItem::linkToCrud('Categories', 'fas fa-tags', CategorieOeuvre::class),
            MenuItem::linkToCrud('Prestations', 'fas fa-chalkboard-teacher', Prestation::class),
            MenuItem::linkToCrud('Articles Culturels', 'far fa-newspaper', Article::class)

        ];
    }
}
