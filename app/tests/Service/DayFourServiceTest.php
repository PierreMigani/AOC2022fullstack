<?php

include_once __DIR__ . '/../../src/Service/DayInterface.php';
include_once __DIR__ . '/../../src/Service/DayFourService.php';
include_once __DIR__ . '/../../src/Entity/DayFour/CleaningAssignment.php';

use PHPUnit\Framework\TestCase;
use Service\DayFourService;

class DayFourServiceTest extends TestCase
{
    public function testParseAndCompute(): void
    {
        $service = new DayFourService();
        $service->parse([
            "2-4,6-8",
            "2-3,4-5",
            "5-7,7-9",
            "2-8,3-7",
            "6-6,4-6",
            "2-6,4-8"
        ]);

        $this->assertEquals(2, $service->computePartOne());
        $this->assertEquals(4, $service->computePartTwo());
    }
}  
