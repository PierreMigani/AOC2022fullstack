<?php

namespace Entity\DayNine;

abstract class AbstractMotionCommand
{
    public function __construct(
        protected Rope $rope,
        private int $nbSteps
    ) {}

    public function execute(): void
    {
        $nbSteps = $this->nbSteps;
        while ($nbSteps > 0) {
            $this->executeStep();
            $nbSteps--;
        }
    }

    abstract protected function executeStep(): void;
}
