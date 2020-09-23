<?php

namespace App\Controller;

use App\Entity\Prestation;
use App\Repository\PrestationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class PrestationController extends AbstractController
{
  /**
     * @Route("/prestation", name="prestation")
     */
    public function index()
    {
       
        return $this->render('Prestation/prestation.html.twig');
    }
}
