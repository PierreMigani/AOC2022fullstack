<?php

namespace Entity\DayNine;

class MoveDownCommand extends AbstractMotionCommand
{
    protected function executeStep(): void
    {
        $this->rope->move(0, -1);
    }
}
