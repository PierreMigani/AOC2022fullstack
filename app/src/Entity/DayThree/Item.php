<?php

namespace Entity\DayThree;

class Item
{
    public function __construct(
        private string $type,
        private int $priority,
        private int $quantity = 0
    ) {}

    public function incQuantity()
    {
        $this->quantity++;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getPriority()
    {
        return $this->priority;
    }
}
