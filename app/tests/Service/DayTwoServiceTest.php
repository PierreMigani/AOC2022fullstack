<?php

include_once __DIR__ . '/../../src/Service/DayTwoService.php';
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
use Service\DayTwoService;

class DayTwoServiceTest extends TestCase
{
    public function testParseAndCompute(): void
    {
        $service = new DayTwoService();
        $service->parse(['A Y', 'B X', 'C Z']);

        $this->assertEquals(15, $service->computePartOne());
        $this->assertEquals(12, $service->computePartTwo());
    }
}  
