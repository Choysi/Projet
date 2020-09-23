<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CosplayController extends AbstractController
{
  /**
     * @Route("/cosplay", name="cosplay")
     */
    public function index()
    {
       
        return $this->render('Cosplay/cosplay.html.twig');
    }
}
