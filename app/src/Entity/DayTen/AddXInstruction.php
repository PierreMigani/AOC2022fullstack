<?php

namespace Entity\DayTen;

class AddXInstruction extends AbstractInstruction
{
    public function __construct(
        private CentralProcessingUnit $cpu,
        int $nbCycle,
        private int $value,
    ) {
        parent::__construct($cpu, $nbCycle);
    }

    protected function executeInstruction(): void
    {
        $this->cpu->addXRegister($this->value);
    }
}
