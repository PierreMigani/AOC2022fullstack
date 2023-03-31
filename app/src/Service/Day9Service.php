<?php

namespace Service;

use Entity\DayNine\Rope;
use Factory\DayNine\MotionCommandFactory;

class Day9Service implements DayInterface
{
    private Rope $smallRope;
    private Rope $bigRope;

    private MotionCommandFactory $smallRopeMotionCommandFactory;
    private MotionCommandFactory $bigRopeMotionCommandFactory;

    private array $smallRopeMotionCommands;
    private array $bigRopeMotionCommands;

    public function __construct() {
        $this->smallRope = new Rope(2); // for first part
        $this->bigRope = new Rope(10); // for second part

        $this->smallRopeMotionCommandFactory = new MotionCommandFactory($this->smallRope);
        $this->bigRopeMotionCommandFactory = new MotionCommandFactory($this->bigRope);

        $this->smallRopeMotionCommands = [];
        $this->bigRopeMotionCommands = [];
    }

    public function parse(array $inputLines): void
    {
        foreach ($inputLines as $inputLine) {
            // first character is direction, rest is number of steps
            $direction = $inputLine[0];
            $steps = intval(substr($inputLine, 1));

            $smallRopeMotionCommand = $this->smallRopeMotionCommandFactory->create($direction, $steps);
            if ($smallRopeMotionCommand !== null) {
                $this->smallRopeMotionCommands[] = $smallRopeMotionCommand;
            }
            
            $bigRopeMotionCommand = $this->bigRopeMotionCommandFactory->create($direction, $steps);
            if ($bigRopeMotionCommand !== null) {
                $this->bigRopeMotionCommands[] = $bigRopeMotionCommand;
            }
        }
    }

    public function computePartOne(): int
    {
        for ($i = 0; $i < count($this->smallRopeMotionCommands); $i++) {
            $this->smallRopeMotionCommands[$i]->execute();
        }

        $tail = $this->smallRope->getTail();

        return count($tail->getVisitedPositions());
    }

    public function computePartTwo(): int
    {
        for ($i = 0; $i < count($this->bigRopeMotionCommands); $i++) {
            $this->bigRopeMotionCommands[$i]->execute();
        }

        $tail = $this->bigRope->getTail();

        return count($tail->getVisitedPositions());
    }
}
