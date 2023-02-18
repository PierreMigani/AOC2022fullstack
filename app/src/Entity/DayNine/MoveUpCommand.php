<?php

namespace Entity\DayNine;

class MoveUpCommand extends AbstractMotionCommand
{
    protected function executeStep(): void
    {
        $this->rope->move(0, 1);
    }
}
