<?php

namespace App\Controller;

use App\Service\BudgetSummaryGenerator;
use DateTime;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(BudgetSummaryGenerator $budgetSummaryGenerator): Response
    {
        $user = $this->getUser();
        $today = new DateTime();
        $budgetSummaries = $budgetSummaryGenerator->getUserBudgetSummaries($user, $today, $today);
        return $this->render('home/index.html.twig', [
            'budgetSummaries' => $budgetSummaries
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new Exception('Don\'t forget to activate logout in security.yaml');
    }
}
