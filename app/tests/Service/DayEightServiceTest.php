<?php

include_once __DIR__ . '/../../src/Service/DayInterface.php';
include_once __DIR__ . '/../../src/Service/DayEightService.php';
include_once __DIR__ . '/../../src/Entity/DayEight/TreeMap.php';
include_once __DIR__ . '/../../src/Entity/DayEight/Tree.php';

use PHPUnit\Framework\TestCase;
use Service\DayEightService;

class DayEightServiceTest extends TestCase
{
    public function testParseAndCompute(): void
    {
        $service = new DayEightService();

        $service->parse([
            "30373",
            "25512",
            "65332",
            "33549",
            "35390",
        ]);

        $this->assertEquals(21, $service->computePartOne());
        $this->assertEquals(8, $service->computePartTwo());
    }
}
