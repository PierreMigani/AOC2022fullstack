<?php

namespace Factory\DayTwo;

use Entity\DayTwo\Move;
use Entity\DayTwo\Paper;
use Entity\DayTwo\Rock;
use Entity\DayTwo\Scissors;

class MoveFactory {
    public function create(string $moveSign): ?Move
    {
        switch($moveSign) {
            case 'X':
            case 'A':
                return new Rock();
            case 'Y':
            case 'B':
                return new Paper();
            case 'Z':
            case 'C':
                return new Scissors();
        }

        return null;
    }
}
