<?php
namespace App\Service;

use App\Entity\Consumption;
use Doctrine\ORM\EntityManagerInterface;
use App\Example\Calculator;

class ConsumptionService
{
    private EntityManagerInterface $entityManager;
    private Calculator $calculator;

    public function __construct(EntityManagerInterface $entityManager, Calculator $calculator)
    {
        $this->entityManager = $entityManager;
        $this->calculator = $calculator;
    }

    public function computeAndSave(string $name, int $morningCoffee, int $afternoonCoffee, int $eveningCoffee): int
    {
        // Compute the total using the Calculator service
        $total = $this->calculator->calculateTotal($morningCoffee, $afternoonCoffee, $eveningCoffee);

        // Create a new Consumption entity and set its properties
        $consumption = new Consumption();
        $consumption->setName($name);
        $consumption->setTotal($total);

        // Persist the entity to the database
        $this->entityManager->persist($consumption);
        $this->entityManager->flush();

        // Return the ID of the persisted entity
        return $consumption->getId();
    }
}
