<?php

namespace Entity\DayTwo;

class Paper extends Move {
    public function __construct()
    {
        parent::__construct(
            points: 2,
            strongerMoveClassname: Scissors::class,
            weakerMoveClassname: Rock::class,
        );
    }
}
