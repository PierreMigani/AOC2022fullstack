<?php

include_once __DIR__ . '/../../src/Service/DayInterface.php';
include_once __DIR__ . '/../../src/Service/Day3Service.php';
include_once __DIR__ . '/../../src/Entity/DayThree/Rucksack.php';
include_once __DIR__ . '/../../src/Entity/DayThree/Compartment.php';
include_once __DIR__ . '/../../src/Entity/DayThree/Item.php';
include_once __DIR__ . '/../../src/Entity/DayThree/ElfGroup.php';
include_once __DIR__ . '/../../src/Factory/DayThree/ItemFactory.php';

use PHPUnit\Framework\TestCase;
use Service\Day3Service;

class Day3ServiceTest extends TestCase
{
    public function testParseAndCompute(): void
    {
        $service = new Day3Service();
        $service->parse([
            "vJrwpWtwJgWrhcsFMMfFFhFp",
            "jqHRNqRjqzjGDLGLrsFMfFZSrLrFZsSL",
            "PmmdzqPrVvPwwTWBwg",
            "wMqvLMZHhHMvwLHjbvcjnnSBnvTQFn",
            "ttgJtRGJQctTZtZT",
            "CrZsJsPPZsGzwwsLwLmpwMDw",
        ]);

        $this->assertEquals(157, $service->computePartOne());
        $this->assertEquals(70, $service->computePartTwo());
    }
}  
