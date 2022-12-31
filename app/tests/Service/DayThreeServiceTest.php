<?php

include_once __DIR__ . '/../../src/Service/DayInterface.php';
include_once __DIR__ . '/../../src/Service/DayThreeService.php';
include_once __DIR__ . '/../../src/Entity/DayThree/Rucksack.php';
include_once __DIR__ . '/../../src/Entity/DayThree/Compartment.php';
include_once __DIR__ . '/../../src/Entity/DayThree/Item.php';
include_once __DIR__ . '/../../src/Entity/DayThree/ElfGroup.php';
include_once __DIR__ . '/../../src/Factory/DayThree/ItemFactory.php';

use PHPUnit\Framework\TestCase;
use Service\DayThreeService;

class DayThreeServiceTest extends TestCase
{
    public function testParseAndCompute(): void
    {
        $service = new DayThreeService();
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
