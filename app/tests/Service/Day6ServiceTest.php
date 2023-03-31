<?php

include_once __DIR__ . '/../../src/Service/DayInterface.php';
include_once __DIR__ . '/../../src/Service/Day6Service.php';
include_once __DIR__ . '/../../src/Entity/DaySix/Device.php';
include_once __DIR__ . '/../../src/Entity/DaySix/AbstractMarkerDetector.php';
include_once __DIR__ . '/../../src/Entity/DaySix/StartOfPacketDetectorSubroutine.php';
include_once __DIR__ . '/../../src/Entity/DaySix/StartOfMessageDetectorSubroutine.php';

use PHPUnit\Framework\TestCase;
use Service\Day6Service;

class Day6ServiceTest extends TestCase
{
    public function testParseAndComputePartOne(): void
    {
        $service = new Day6Service();
        
        $service->parse(["mjqjpqmgbljsphdztnvjfqwrcgsmlb"]);
        $this->assertEquals(7, $service->computePartOne());

        $service->parse(["bvwbjplbgvbhsrlpgdmjqwftvncz"]);
        $this->assertEquals(5, $service->computePartOne());

        $service->parse(["nppdvjthqldpwncqszvftbrmjlhg"]);
        $this->assertEquals(6, $service->computePartOne());

        $service->parse(["nznrnfrfntjfmvfwmzdfjlvtqnbhcprsg"]);
        $this->assertEquals(10, $service->computePartOne());

        $service->parse(["zcfzfwzzqfrljwzlrfnpqdbhtmscgvjw"]);
        $this->assertEquals(11, $service->computePartOne());
    }

    public function testParseAndComputePartTwo(): void
    {
        $service = new Day6Service();
        
        $service->parse(["mjqjpqmgbljsphdztnvjfqwrcgsmlb"]);
        $this->assertEquals(19, $service->computePartTwo());

        $service->parse(["bvwbjplbgvbhsrlpgdmjqwftvncz"]);
        $this->assertEquals(23, $service->computePartTwo());

        $service->parse(["nppdvjthqldpwncqszvftbrmjlhg"]);
        $this->assertEquals(23, $service->computePartTwo());

        $service->parse(["nznrnfrfntjfmvfwmzdfjlvtqnbhcprsg"]);
        $this->assertEquals(29, $service->computePartTwo());

        $service->parse(["zcfzfwzzqfrljwzlrfnpqdbhtmscgvjw"]);
        $this->assertEquals(26, $service->computePartTwo());
    }
}  
