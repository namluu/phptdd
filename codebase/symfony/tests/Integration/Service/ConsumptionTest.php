<?php
namespace App\Tests\Integration\Service;

use App\Service\ConsumptionService;
use PHPUnit\Framework\TestCase;
use App\Entity\Consumption;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ConsumptionTest extends KernelTestCase
{
    public function testCanComputeAndSave()
    {
        // Given
        $name = "Damo";
        $morningCoffee = 2;
        $afternoonCoffee = 3;
        $eveningCoffee = 1;
        // Expected Total:
        $expectedTotal = 6;
        // Persist the data
        self::bootKernel();
        $service = self::getContainer()->get(ConsumptionService::class);
        $persistedId = $service->computeAndSave($name, $morningCoffee, $afternoonCoffee, $eveningCoffee);
        // Verify if the data persisted is correct
        $entityManager = self::getContainer()->get('doctrine')->getManager();
        $consumption = $entityManager->getRepository(Consumption::class)->find($persistedId);
        $this->assertNotNull($consumption);
        $this->assertEquals($name, $consumption->getName());
        $this->assertEquals($expectedTotal, $consumption->getTotal());
    }
}
