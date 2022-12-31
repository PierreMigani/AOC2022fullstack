<?php

namespace Service;

use Entity\DayOne\Elf;

class DayOneService implements DayInterface {
    // typehint the array to contain only Elf objects
    /** @var Elf[] */
    private $elves;

    public function __construct() {
        $this->elves = [];
    }

    public function parse(array $inputLines): void {
        // split array inputLines in subarray , using empty lines as separator
        $groups = [[]];
        foreach ($inputLines as $line) {
            if (empty($line)) {
                $groups[] = [];
            } else {
                $groups[count($groups) - 1][] = $line;
            }
        }
        
        foreach ($groups as $group) {
            // create an elf for each group
            $elf = new Elf();

            // convert the raw calories to integers
            $calories = array_map('intval', $group);

            foreach ($calories as $calorie) {
                $elf->addFood($calorie);
            }

            $this->elves[] = $elf;
        }
    }

    public function computePartOne(): int {
        $highestTotalCalories = 0;
        foreach ($this->elves as $elf) {
            $totalCalories = $elf->getCalories();

            if ($totalCalories > $highestTotalCalories) {
                $highestTotalCalories = $totalCalories;
            }
        }

        return (string) $highestTotalCalories;
    }

    public function computePartTwo(): int {
        $sortedElves = $this->elves;
        usort($sortedElves, function (Elf $a, Elf $b) {
            return $a->getCalories() <=> $b->getCalories();
        });

        // get last 3 elves with the most calories
        $topThreeElves = array_slice($sortedElves, -3);

        // sum the calories of the top 3 elves
        $totalCalories = 0;
        foreach ($topThreeElves as $elf) {
            $totalCalories += $elf->getCalories();
        }

        return (string) $totalCalories;
    }
}
