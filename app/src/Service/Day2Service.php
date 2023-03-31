<?php

namespace Service;

use Entity\DayTwo\Round;
use Entity\DayTwo\Tournament;
use Factory\DayTwo\MoveFactory;
use Factory\DayTwo\SuitableMoveFactory;

class Day2Service implements DayInterface {
    private array $roundSigns;
    private MoveFactory $moveFactory;
    private SuitableMoveFactory $suitableMoveFactory;

    public function __construct() {
        $this->roundSigns = [];
        $this->moveFactory = new MoveFactory();
        $this->suitableMoveFactory = new SuitableMoveFactory();
    }

    public function parse(array $inputLines): void {

        foreach ($inputLines as $roundRaw) {
            $this->roundSigns[] = explode(' ', $roundRaw);
        }
    }

    public function computePartOne(): int {
        // Create a new tournament
        $tournament = new Tournament();

        // Loop through each round
        foreach ($this->roundSigns as $roundSigns) {
            // Skip the last line
            if (count($roundSigns) !== 2) {
                continue;
            }

            // Get the move signs
            $advMoveSign = $roundSigns[0];
            $yourMoveSign = $roundSigns[1];

            // Create the move objects
            $advMove = $this->moveFactory->create($advMoveSign);
            $yourMove = $this->moveFactory->create($yourMoveSign);

            // Create the round and add it to the tournament
            $round = new Round($advMove, $yourMove);
            $tournament->addRound($round);
        }

        // Return the points
        return $tournament->getPoints();
    }

    public function computePartTwo(): int {
        $tournament = new Tournament();

        foreach ($this->roundSigns as $roundSigns) {
            $advMoveSign = $roundSigns[0] ?? null;
            $resultSign = $roundSigns[1] ?? null;

            if (!$advMoveSign || !$resultSign) {
                continue;
            }

            $advMove = $this->moveFactory->create($advMoveSign);
            $yourMove = $this->suitableMoveFactory->create($advMove, $resultSign);

            $round = new Round($advMove, $yourMove);
            $tournament->addRound($round);
        }

        return $tournament->getPoints();
    }
}
