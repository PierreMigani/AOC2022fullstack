<?php

include_once __DIR__ . '/../../src/Entity/DayOne/Elf.php';
include_once __DIR__ . '/../../src/Service/DayInterface.php';
include_once __DIR__ . '/../../src/Service/Day1Service.php';

use PHPUnit\Framework\TestCase;
use Service\Day1Service;

class Day1ServiceTest extends TestCase
{
    public function testParseAndCompute(): void
    {
        $service = new Day1Service();
        $service->parse([
            '1000',
            '2000',
            '3000', 
            '',
            '4000',
            '',
            '5000',
            '6000',
            '',
            '7000',
            '8000',
            '9000',
            '',
            '10000'
        ]);

        $this->assertEquals(24000, $service->computePartOne());
        $this->assertEquals(45000, $service->computePartTwo());
    }
}  
