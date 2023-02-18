<?php

namespace Entity\DayNine;

class Position
{
    public function __construct(
        private int $x,
        private int $y,
    ) {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): int {
        return $this->x;
    }

    public function getY(): int {
        return $this->y;
    }

    public function move(int $x, int $y): void {
        $this->x += $x;
        $this->y += $y;
    }

    public function getCoordinates(): string {
        return sprintf('%d,%d', $this->x, $this->y);
    }
}
