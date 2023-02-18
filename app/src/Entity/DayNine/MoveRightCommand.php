<?php

namespace Entity\DayNine;

class MoveRightCommand extends AbstractMotionCommand
{
    protected function executeStep(): void
    {
        $this->rope->move(1, 0);
    }
}
