<?php

namespace Entity\DayThree;

class Item
{
    public function __construct(
        private string $type,
        private int $priority,
        private int $quantity = 0
    ) {}

    public function incQuantity(): void
    {
        $this->quantity++;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }
}
