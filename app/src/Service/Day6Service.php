<?php

namespace Service;

use Entity\DaySix\Device;
use Entity\DaySix\StartOfMessageDetectorSubroutine;
use Entity\DaySix\StartOfPacketDetectorSubroutine;

class Day6Service implements DayInterface {
    private Device $device;

    public function parse(array $inputLines): void
    {
        $this->device = new Device();
        foreach ($inputLines as $line) {
            $this->device->addData($line);
        }
        $this->device->saveDatastream();
    }

    public function computePartOne(): ?int
    {
        $this->device->restoreDatastream();

        $subroutine = new StartOfPacketDetectorSubroutine($this->device);
        
        return $subroutine->run();
    }

    public function computePartTwo(): int
    {
        $this->device->restoreDatastream();

        $subroutine = new StartOfMessageDetectorSubroutine($this->device);
        
        return $subroutine->run();
    }
}
