<?php

namespace Entity\DayTwo;

class Tournament {
    /** @var Round[] */
    private array $rounds = [];

    public function addRound(Round $round): void
    {
        $this->rounds[] = $round;
    }

    public function getPoints(): int
    {
        $points = 0;
        foreach($this->rounds as $round) {
            $points += $round->getYourPoints();
        }

        return $points;
    }
}
