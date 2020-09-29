<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class DecorsController extends AbstractController
{
  /**
     * @Route("/decors", name="decors")
     */
    public function index()
    {
        return $this->render('Decors/decors.html.twig');
    }
}
