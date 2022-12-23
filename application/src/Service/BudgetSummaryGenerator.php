<?php

namespace App\Service;

use App\Class\BudgetSummary;
use App\Entity\Budget;
use App\Entity\User;
use App\Repository\BudgetRepository;
use DateTime;
use Symfony\Component\Security\Core\User\UserInterface;

class BudgetSummaryGenerator
{
    private BudgetRepository $budgetRepository;

    public function __construct(BudgetRepository $budgetRepository)
    {
        $this->budgetRepository = $budgetRepository;
    }

    /**
     * @return BudgetSummary[]
     */
    public function getUserBudgetSummaries(User|UserInterface $user, DateTime $dateFrom, DateTime $dateTo): array
    {

        $budgetSummaries = [];
        $budgets = $this->budgetRepository->findByOwner($user);

        foreach ($budgets as $budget) {
            $budgetSummaries[] = $this->getBudgetSummary($budget, $dateFrom, $dateTo);
        }

        return $budgetSummaries;
    }

    public function getBudgetSummary(Budget $budget, DateTime $dateFrom, DateTime $dateTo): BudgetSummary
    {
        $budgetSummary = new BudgetSummary($budget, $dateFrom, $dateTo);

        return $budgetSummary;
    }
}