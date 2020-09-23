<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product_index")
     */
    public function index(ProductRepository $productRepository)
    {
        return $this->render('product/index.html.twig', [
            'products' => $productRepository->findAll()
        ]);
    }

     /**
     * @Route("/category/{id}", name="showCategory")
     */
    public function showByCategory(ProductRepository $productRepository,Product $product)
    {
        return $this->render('product/index.html.twig', [
            'products' => $productRepository->allByCatergory($product)
        ]);
    }

     /**
     * @Route("/add", name="product_add")
     * @Route("/{id}/edit", name="product_edit")
     */
    public function add_edit(Product $product = null, Request $request)
    {
        // si le product n'existe pas, on instancie un nouveau Product (on est dans le cas d'un ajout)
        if (!$product) {
            $product = new Product();
        }

        // il faut créer un ProductType au préalable (php bin/console make:form
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);
        // si on soumet le formulaire et que le form est valide
        if ($form->isSubmitted() && $form->isValid()) {
            // on récupère les données du formulaire
            $product = $form->getData();
            // on ajoute le nouveau product
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($product);
            $entityManager->flush();
            // on redirige vers la liste des products (products_list étant le nom de la route qui liste tous les products dans ProductController)
            return $this->redirectToRoute('product_index');
        }

        /* on renvoie à la vue correspondante : 
            - le formulaire
            - le booléen editMode (si vrai, on est dans le cas d'une édition sinon on est dans le cas d'un ajout)
        */
        return $this->render('product/add_edit.html.twig', [
            'formProduct' => $form->createView(),
            'editMode' => $product->getId() !== null
        ]);
    }
}
