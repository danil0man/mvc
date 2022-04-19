<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
    * @Route("/", name="index")
    */
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }


     /**
    * @Route("/report", name="report")
    */
    public function report(): Response
    {
        return $this->render('report.html.twig', [

        ]);
    }
}
