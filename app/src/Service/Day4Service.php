<?php

namespace Service;

use Entity\DayFour\CleaningAssignment;

class Day4Service implements DayInterface {
    private array $elfPairs;

    public function __construct(
    ) {
        $this->elfPairs = [];
    }

    public function parse(array $inputLines): void {
        foreach ($inputLines as $line) {
            $rawSectors = explode(',', $line);
            $assignments = [];
            foreach ($rawSectors as $rawSector) {
                $sectorIdsLimits = explode('-', $rawSector);
                $sectorIds = range($sectorIdsLimits[0], $sectorIdsLimits[1]);
                $assignments[] = new CleaningAssignment($sectorIds);
            }

            $this->elfPairs[] = $assignments;
        }
    }

    public function computePartOne(): int {
        $nbFullyContainedPairs = 0;
        foreach ($this->elfPairs as $elfPair) {
            if (count($elfPair) !== 2) {
                continue;
            }

            if ($elfPair[0]->fullyContains($elfPair[1]) || $elfPair[1]->fullyContains($elfPair[0])) {
                $nbFullyContainedPairs++;
            }
        }

        return $nbFullyContainedPairs;
    }

    public function computePartTwo(): int
    {
        $nbOverlappingPairs = 0;
        foreach ($this->elfPairs as $elfPair) {
            if (count($elfPair) !== 2) {
                continue;
            }

            if ($elfPair[0]->partiallyContains($elfPair[1]) || $elfPair[1]->partiallyContains($elfPair[0])) {
                $nbOverlappingPairs++;
            }
        }

        return $nbOverlappingPairs;
    }
}
