<?php

namespace Entity\DayOne;

class Elf {
    public function __construct(
        private int $calories = 0,
    ) {}

    public function addFood(int $foodCalories): void {
        $this->calories += $foodCalories;
    }

    public function getCalories(): int {
        return $this->calories;
    }
}
