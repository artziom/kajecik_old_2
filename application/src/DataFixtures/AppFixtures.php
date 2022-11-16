<?php

namespace App\DataFixtures;

use App\Factory\BudgetFactory;
use App\Factory\FinancialResourceFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = UserFactory::createOne(['username' => 'user', 'password' => 'secret']);
        UserFactory::createMany(5);

        $homeBudget = BudgetFactory::createOne(['name' => 'Home finances', 'owner' => $user]);
        $hobbyBudget = BudgetFactory::createOne(['name' => 'Hobby', 'owner' => $user]);

        BudgetFactory::createMany(5);

        FinancialResourceFactory::createOne(['name' => 'Bank account', 'amount' => 700000, 'budget' => $homeBudget]);
        FinancialResourceFactory::createOne(['name' => 'Wallet', 'amount' => 25000, 'budget' => $homeBudget]);

        FinancialResourceFactory::createOne(['name' => 'Bank account', 'amount' => 50000, 'budget' => $hobbyBudget]);
        FinancialResourceFactory::createOne(['name' => 'Wallet', 'amount' => 5000, 'budget' => $hobbyBudget]);

        FinancialResourceFactory::createMany(10);

        $manager->flush();
    }
}
