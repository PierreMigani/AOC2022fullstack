<?php

namespace Factory\DayNine;

use Entity\DayNine\AbstractMotionCommand;
use Entity\DayNine\MoveDownCommand;
use Entity\DayNine\MoveLeftCommand;
use Entity\DayNine\MoveRightCommand;
use Entity\DayNine\MoveUpCommand;
use Entity\DayNine\Rope;

class MotionCommandFactory
{
    public function __construct(
        private Rope $rope
    ) {}

    public function create(string $direction, int $steps): ?AbstractMotionCommand
    {
        switch ($direction) {
            case 'U':
                return new MoveUpCommand($this->rope, $steps);
            case 'R':
                return new MoveRightCommand($this->rope, $steps);
            case 'L':
                return new MoveLeftCommand($this->rope, $steps);
            case 'D':
                return new MoveDownCommand($this->rope, $steps);
        }

        return null;
    }
}
