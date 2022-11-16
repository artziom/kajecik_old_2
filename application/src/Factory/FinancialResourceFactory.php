<?php

namespace App\Factory;

use App\Entity\FinancialResource;
use App\Repository\FinancialResourceRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<FinancialResource>
 *
 * @method static FinancialResource|Proxy createOne(array $attributes = [])
 * @method static FinancialResource[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static FinancialResource[]|Proxy[] createSequence(array|callable $sequence)
 * @method static FinancialResource|Proxy find(object|array|mixed $criteria)
 * @method static FinancialResource|Proxy findOrCreate(array $attributes)
 * @method static FinancialResource|Proxy first(string $sortedField = 'id')
 * @method static FinancialResource|Proxy last(string $sortedField = 'id')
 * @method static FinancialResource|Proxy random(array $attributes = [])
 * @method static FinancialResource|Proxy randomOrCreate(array $attributes = [])
 * @method static FinancialResource[]|Proxy[] all()
 * @method static FinancialResource[]|Proxy[] findBy(array $attributes)
 * @method static FinancialResource[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static FinancialResource[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static FinancialResourceRepository|RepositoryProxy repository()
 * @method FinancialResource|Proxy create(array|callable $attributes = [])
 */
final class FinancialResourceFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();
    }

    protected static function getClass(): string
    {
        return FinancialResource::class;
    }

    protected function getDefaults(): array
    {
        return [
            'name' => self::faker()->words(3, true),
            'amount' => self::faker()->numberBetween(5000, 400000),
            'budget' => BudgetFactory::randomOrCreate()
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this// ->afterInstantiate(function(FinancialResource $financialResource): void {})
            ;
    }
}
