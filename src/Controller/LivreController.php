<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class LivreController extends AbstractController
{
    /**
     * @Route("/livres", name="livres")
     */
    public function index()
    {
        return $this->render('livres/livres.html.twig');
    }

    
}
