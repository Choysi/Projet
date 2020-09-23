<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class YokaiController extends AbstractController
{
    /**
     * @Route("/Yôkai", name="Yôkai")
     */
    public function index()
    {
       
        return $this->render('Yôkai/Yôkai.html.twig');
    }

    
}
