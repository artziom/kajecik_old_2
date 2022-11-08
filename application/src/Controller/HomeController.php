<?php

namespace App\Controller;

use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new Exception('Don\'t forget to activate logout in security.yaml');
    }
}
