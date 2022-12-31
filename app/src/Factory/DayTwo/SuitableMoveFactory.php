<?php

namespace Factory\DayTwo;

use Entity\DayTwo\Move;

class SuitableMoveFactory {
    public function create(Move $move, string $expectedResultSign): ?Move
    {
        $suitableMoveClassname = null;
        switch($expectedResultSign) {
            // Lose
            case 'X':
                $suitableMoveClassname = $move->getWeakerMoveClassname();
                break;
            // Draw
            case 'Y':
                $suitableMoveClassname = get_class($move);
                break;
            // Win
            case 'Z':
                $suitableMoveClassname = $move->getStrongerMoveClassname();
                break;
        }

        if ($suitableMoveClassname) {
            return new $suitableMoveClassname();
        }

        return null;
    }
}
