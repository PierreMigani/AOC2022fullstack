<?php

namespace Entity\DayTen;

abstract class AbstractInstruction
{
    public function __construct(
        private CentralProcessingUnit $cpu,
        private int $nbCycle,
    ) {
    }

    public function execute(): void
    {
        for ($i = 0; $i < $this->nbCycle; $i++) {
            $this->cpu->spendCycle();
        }

        $this->executeInstruction();
    }

    abstract protected function executeInstruction(): void;
}
