<?php

namespace Entity\DayFive;

class Crate {
    public function __construct(
        private string $name,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }
}
