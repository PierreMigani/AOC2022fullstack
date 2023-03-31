<?php

namespace Service;
use Entity\DayTen\CathodeRayTube;
use Entity\DayTen\CentralProcessingUnit;
use Factory\DayTen\InstructionFactory;

class Day10Service implements DayInterface
{
    private CentralProcessingUnit $cpu;
    private CathodeRayTube $crt;
    private InstructionFactory $instructionFactory;

    public function __construct()
    {
        $this->cpu = new CentralProcessingUnit();
        $this->crt = new CathodeRayTube();

        $this->instructionFactory = new InstructionFactory();
    }

    public function parse(array $inputLines): void
    {
        foreach ($inputLines as $line) {
            $cpuInstruction = $this->instructionFactory->create($line, $this->cpu);
            $crtInstruction = $this->instructionFactory->create($line, $this->crt);
            
            $this->cpu->addInstruction($cpuInstruction);
            $this->crt->addInstruction($crtInstruction);
        }
    }

    public function computePartOne(): mixed
    {
        $this->cpu->executeInstructions();

        $cycleStrengthsToSum = [20, 60, 100, 140, 180, 220];
        $sum = 0;
        foreach ($cycleStrengthsToSum as $cycle) {
            $sum += $this->cpu->getSignalStrength($cycle);
        }

        return $sum;
    }

    public function computePartTwo(): mixed
    {
        $this->crt->executeInstructions();

        return $this->crt->getScreen();
    }
}
