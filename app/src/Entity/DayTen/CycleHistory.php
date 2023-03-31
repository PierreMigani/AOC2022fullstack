<?php

namespace Entity\DayTen;

class CycleHistory
{
    private array $history;

    public function __construct()
    {
        $this->history = [];
    }

    public function saveState(CentralProcessingUnit $cpu): void
    {
        $this->history[] = $cpu->getXRegister();
    }

    public function getSignalStrength(int $cycle): int
    {
        $value = $this->history[$cycle - 1] ?? 0;
        
        return $cycle * $value;
    }
}
