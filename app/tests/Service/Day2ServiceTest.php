<?php

include_once __DIR__ . '/../../src/Service/Day2Service.php';
include_once __DIR__ . '/../../src/Entity/DayTwo/Round.php';
include_once __DIR__ . '/../../src/Entity/DayTwo/Move.php';
include_once __DIR__ . '/../../src/Entity/DayTwo/Rock.php';
include_once __DIR__ . '/../../src/Entity/DayTwo/Paper.php';
include_once __DIR__ . '/../../src/Entity/DayTwo/Scissors.php';
include_once __DIR__ . '/../../src/Entity/DayTwo/Tournament.php';
include_once __DIR__ . '/../../src/Factory/DayTwo/MoveFactory.php';
include_once __DIR__ . '/../../src/Factory/DayTwo/SuitableMoveFactory.php';
include_once __DIR__ . '/../../src/Service/DayInterface.php';

use PHPUnit\Framework\TestCase;
use Service\Day2Service;

class Day2ServiceTest extends TestCase
{
    public function testParseAndCompute(): void
    {
        $service = new Day2Service();
        $service->parse(['A Y', 'B X', 'C Z']);

        $this->assertEquals(15, $service->computePartOne());
        $this->assertEquals(12, $service->computePartTwo());
    }
}  
