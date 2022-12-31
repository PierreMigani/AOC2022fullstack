<?php

namespace Entity\DayTwo;

class Scissors extends Move {
    public function __construct()
    {
        parent::__construct(
            points: 3,
            strongerMoveClassname: Rock::class,
            weakerMoveClassname: Paper::class,
        );
    }
}
