<?php

include_once __DIR__ . '/../../src/Service/DayInterface.php';
include_once __DIR__ . '/../../src/Service/DayNineService.php';
include_once __DIR__ . '/../../src/Entity/DayNine/Rope.php';
include_once __DIR__ . '/../../src/Entity/DayNine/Knot.php';
include_once __DIR__ . '/../../src/Entity/DayNine/Position.php';
include_once __DIR__ . '/../../src/Entity/DayNine/AbstractMotionCommand.php';
include_once __DIR__ . '/../../src/Entity/DayNine/MoveDownCommand.php';
include_once __DIR__ . '/../../src/Entity/DayNine/MoveUpCommand.php';
include_once __DIR__ . '/../../src/Entity/DayNine/MoveLeftCommand.php';
include_once __DIR__ . '/../../src/Entity/DayNine/MoveRightCommand.php';
include_once __DIR__ . '/../../src/Factory/DayNine/MotionCommandFactory.php';

use PHPUnit\Framework\TestCase;
use Service\DayNineService;

class DayNineServiceTest extends TestCase
{
    public function testParseAndComputePartOne(): void
    {
        $service = new DayNineService();

        $service->parse([
            'R 4',
            'U 4',
            'L 3',
            'D 1',
            'R 4',
            'D 1',
            'L 5',
            'R 2'
        ]);

        $this->assertEquals(13, $service->computePartOne());
    }

    public function testParseAndComputePartTwo(): void
    {
        $service = new DayNineService();

        $service->parse([
            'R 5',
            'U 8',
            'L 8',
            'D 3',
            'R 17',
            'D 10',
            'L 25',
            'U 20',
        ]);

        $this->assertEquals(36, $service->computePartTwo());
    }
}
