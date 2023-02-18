<?php

namespace Entity\DaySeven;

class CommandResponse
{
    private array $parts;

    public function __construct(
    ) {
        $this->parts = [];
    }

    public function addPart(string $part): void
    {
        $this->parts[] = $part;
    }

    public function getParts(): array
    {
        return $this->parts;
    }
}
