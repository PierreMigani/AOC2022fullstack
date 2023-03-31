<?php

namespace Factory\DayTen;

use Entity\DayTen\AbstractInstruction;
use Entity\DayTen\CentralProcessingUnit;
use Entity\DayTen\AddXInstruction;
use Entity\DayTen\NoopInstruction;

class InstructionFactory
{
    public function create(string $instruction, CentralProcessingUnit $cpu): AbstractInstruction
    {
        $instruction = trim($instruction);

        // AddXInstruction (2 cycles)
        // pattern: addx <value>
        // value can be negative
        if (preg_match('/^addx (-?\d+)$/', $instruction, $matches)) {
            return new AddXInstruction($cpu, 2, (int) $matches[1]);
        }

        // NoopInstruction (1 cycle)
        // pattern: noop
        if (preg_match('/^noop$/', $instruction)) {
            return new NoopInstruction($cpu, 1);
        }

        throw new \Exception('Unknown instruction: ' . $instruction);
    }
}
