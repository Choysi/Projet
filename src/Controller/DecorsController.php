<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class DecorsController extends AbstractController
{
  /**
     * @Route("/décors", name="décors")
     */
    public function index()
    {
        return $this->render('Décors/décors.html.twig');
    }
}
