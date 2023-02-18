<?php

namespace Entity\DayNine;

class Knot
{
    private Position $position;
    private ?Knot $next;
    private array $visitedPositions;

    public function __construct() {
        $this->position = new Position(0, 0);
        $this->next = null;
        $this->visitedPositions = [
            $this->position->getCoordinates() => clone $this->position,
        ];
    }

    public function getPosition(): Position {
        return $this->position;
    }

    public function getVisitedPositions(): array {
        return $this->visitedPositions;
    }

    public function move(int $x, int $y): void {
        $this->position->move($x, $y);
        $this->visitedPositions[$this->position->getCoordinates()] = clone $this->position;
    
        if ($this->next === null) {
            return;
        }
    
        $childKnotPosition = $this->next->getPosition();

        // if child knot is adjacent to parent, does not move tail
        if (abs($this->position->getX() - $childKnotPosition->getX()) <= 1 &&
            abs($this->position->getY() - $childKnotPosition->getY()) <= 1
        ) { return; }

        // if child knot is not adjacent to parent, move child the nearest way to parent
        // can only move one knot at a time
        $childKnotXMove = 0;
        $childKnotYMove = 0;

        if ($this->position->getX() > $childKnotPosition->getX()) {
            $childKnotXMove = 1;
        } elseif ($this->position->getX() < $childKnotPosition->getX()) {
            $childKnotXMove = -1;
        }

        if ($this->position->getY() > $childKnotPosition->getY()) {
            $childKnotYMove = 1;
        } elseif ($this->position->getY() < $childKnotPosition->getY()) {
            $childKnotYMove = -1;
        }

        $this->next->move($childKnotXMove, $childKnotYMove);
    }

    public function getNext(): ?Knot {
        return $this->next;
    }

    public function setNext(Knot $next): void {
        $this->next = $next;
    }
}
