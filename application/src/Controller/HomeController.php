<?php

namespace App\Controller;

use App\Repository\BudgetRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(BudgetRepository $budgetRepository): Response
    {
        $user = $this->getUser();
        $budgets = $budgetRepository->findBy(['owner' => $user]);
        return $this->render('home/index.html.twig', [
            'budgets' => $budgets
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new Exception('Don\'t forget to activate logout in security.yaml');
    }
}
