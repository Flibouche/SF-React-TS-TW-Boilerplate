<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RouterController extends AbstractController
{
    #[Route('/', name: 'public_app_index', methods: ['GET'])]
    public function indexRedirect(): Response
    {
        return $this->redirectToRoute('public_app_home');
    }

    #[Route('/home', name: 'public_app_home', methods: ['GET'])]
    #[Route('/test', name: 'public_app_test', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }
}
