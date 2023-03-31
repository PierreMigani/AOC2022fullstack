<?php

namespace Entity\DayTen;

class NoopInstruction extends AbstractInstruction
{
    protected function executeInstruction(): void
    {
        // Do nothing
    }
}
