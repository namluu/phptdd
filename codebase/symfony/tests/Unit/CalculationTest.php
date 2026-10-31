<?php
namespace App\Tests\Unit;
use App\Example\Calculator;
use PHPUnit\Framework\TestCase;

class CalculationTest extends TestCase
{
    /**
     * @covers \App\Example\Calculator::calculateTotal
     */
    public function testCanCalculateTotal()
    {
        // Expected result:
        $expectedTotal = 6;
        // Test data:
        $a = 1;
        $b = 2;
        $c = 3;
        $calculator = new Calculator();
        $total = $calculator->calculateTotal($a, $b, $c);
        $this->assertEquals($expectedTotal, $total);
    }

    /**
     * @covers \App\Example\Calculator::add
     */
    public function testCanAddTwoNumbers()
    {
        // Expected result:
        $expectedSum = 5;
        // Test data:
        $a = 2;
        $b = 3;
        $calculator = new Calculator();
        $sum = $calculator->add($a, $b);
        $this->assertEquals($expectedSum, $sum);
    }

    /**
     * @covers \App\Example\Calculator::getDifference
     */
    public function testCanGetDifferenceOfTwoNumbers()
    {
        // Expected result:
        $expectedDifference = 2;
        // Test data:
        $a = 5;
        $b = 3;
        $calculator = new Calculator();
        // Use reflection to access the private method
        $reflection = new \ReflectionClass(Calculator::class);
        $method = $reflection->getMethod('getDifference');
        $method->setAccessible(true);
        $difference = $method->invoke($calculator, $a, $b);
        $this->assertEquals($expectedDifference, $difference);
    }
}
