<?php

namespace Entity\DayNine;

abstract class AbstractMotionCommand
{
    public function __construct(
        protected Rope $rope,
        private int $steps
    ) {}

    public function execute(): void
    {
        $steps = $this->steps;
        while ($steps > 0) {
            $this->executeStep();
            $steps--;
        }
    }

    abstract protected function executeStep(): void;
}
