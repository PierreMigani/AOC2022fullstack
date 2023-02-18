<?php

namespace Entity\DayFive;

class MoveOrder {
    public function __construct(
        private int $crateAmount,
        private string $sourceStackName,
        private string $destinationStackName,
    ) {}

    public function getCrateAmount(): int
    {
        return $this->crateAmount;
    }

    public function getSourceStackName(): string
    {
        return $this->sourceStackName;
    }

    public function getDestinationStackName(): string
    {
        return $this->destinationStackName;
    }
}
