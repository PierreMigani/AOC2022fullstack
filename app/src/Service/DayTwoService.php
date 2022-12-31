<?php

namespace Service;

use Entity\DayTwo\Round;
use Entity\DayTwo\Tournament;
use Factory\DayTwo\MoveFactory;
use Factory\DayTwo\SuitableMoveFactory;

class DayTwoService implements DayInterface {
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
        $tournament = new Tournament();

        foreach ($this->roundSigns as $roundSigns) {
            $advMoveSign = $roundSigns[0] ?? null;
            $yourMoveSign = $roundSigns[1] ?? null;

            if (!$advMoveSign || !$yourMoveSign) {
                continue;
            }

            $advMove = $this->moveFactory->create($advMoveSign);
            $yourMove = $this->moveFactory->create($yourMoveSign);

            $round = new Round($advMove, $yourMove);
            $tournament->addRound($round);
        }

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
