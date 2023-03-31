<?php

namespace Entity\DayTen;

class CentralProcessingUnit
{
    private int $xRegister;
    private CycleHistory $cycleHistory;
    private ?AbstractInstruction $currentInstruction;
    private array $instructions;
    private int $currentCycle;

    public function __construct()
    {
        $this->reset();
    }

    public function reset(): void
    {
        $this->xRegister = 1;
        $this->cycleHistory = new CycleHistory();
        $this->currentInstruction = null;
        $this->currentCycle = 1;
    }

    public function addInstruction(AbstractInstruction $instruction): void
    {
        $this->instructions[] = $instruction;
    }

    public function executeInstructions(): void
    {
        foreach ($this->instructions as $instruction) {
            $this->currentInstruction = $instruction;
            $this->currentInstruction->execute();
        }
    }

    public function getXRegister(): int
    {
        return $this->xRegister;
    }

    public function addXRegister(int $value): void
    {
        $this->xRegister += $value;
    }

    public function spendCycle(): void
    {
        $this->cycleHistory->saveState($this);
        $this->currentCycle++;
    }

    public function getSignalStrength(int $cycle): int
    {
        return $this->cycleHistory->getSignalStrength($cycle);
    }

    public function getCurrentCycle(): int
    {
        return $this->currentCycle;
    }
}
