<?php

include_once __DIR__ . '/../../src/Service/DayInterface.php';
include_once __DIR__ . '/../../src/Service/Day5Service.php';
include_once __DIR__ . '/../../src/Entity/DayFive/AbstractCrane.php';
include_once __DIR__ . '/../../src/Entity/DayFive/CrateMover9000.php';
include_once __DIR__ . '/../../src/Entity/DayFive/CrateMover9001.php';
include_once __DIR__ . '/../../src/Entity/DayFive/MoveOrder.php';
include_once __DIR__ . '/../../src/Entity/DayFive/Crate.php';
include_once __DIR__ . '/../../src/Entity/DayFive/Ship.php';
include_once __DIR__ . '/../../src/Entity/DayFive/CrateStack.php';

use PHPUnit\Framework\TestCase;
use Service\Day5Service;

class Day5ServiceTest extends TestCase
{
    public function testParseAndCompute(): void
    {
        $service = new Day5Service();
        $service->parse([
            "    [D]    ",   
            "[N] [C]    ",
            "[Z] [M] [P]",
            " 1   2   3 ",
            "",
            "move 1 from 2 to 1",
            "move 3 from 1 to 3",
            "move 2 from 2 to 1",
            "move 1 from 1 to 2",
        ]);

        $this->assertEquals('CMZ', $service->computePartOne());
        $this->assertEquals('MCD', $service->computePartTwo());
    }
}  
