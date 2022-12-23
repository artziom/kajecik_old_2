<?php

namespace App\Class;

use App\Entity\Budget;
use DateTime;

class BudgetSummary
{
    private Budget $budget;
    private DateTime $dateFrom;
    private DateTime $dateTo;

    public function __construct(Budget $budget, DateTime $dateFrom, DateTime $dateTo)
    {
        $this->budget = $budget;
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
    }

    /**
     * @return Budget
     */
    public function getBudget(): Budget
    {
        return $this->budget;
    }

    /**
     * @return DateTime
     */
    public function getDateFrom(): DateTime
    {
        return $this->dateFrom;
    }

    /**
     * @return DateTime
     */
    public function getDateTo(): DateTime
    {
        return $this->dateTo;
    }

}