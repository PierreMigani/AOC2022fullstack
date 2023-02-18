<?php

namespace Entity\DayNine;

class MoveLeftCommand extends AbstractMotionCommand
{
    protected function executeStep(): void
    {
        $this->rope->move(-1, 0);
    }
}
