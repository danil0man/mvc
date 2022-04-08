<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    // Home Router
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    // About Router
    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('about.html.twig', [

        ]);
    }

    // Report Router
    #[Route('/report', name: 'app_report')]
    public function report(): Response
    {
        return $this->render('report.html.twig', [

        ]);
    }
}
