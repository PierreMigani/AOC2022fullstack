<?php

namespace Entity\DayNine;

class Rope
{
    private Knot $head;
    private Knot $tail;

    public function __construct(
        private int $nbKnots
    )
    {
        $this->head = new Knot();
        $knot = $this->head;
        for ($i = 1; $i < $nbKnots; $i++) {
            $nextKnot = new Knot();
            $knot->setNext($nextKnot);
            $knot = $nextKnot;
        }
        $this->tail = $knot;
    }

    public function getHead(): Knot
    {
        return $this->head;
    }

    public function getTail(): Knot
    {
        return $this->tail;
    }

    public function move(int $x, int $y): void
    {
        $this->head->move($x, $y);
    }
}
