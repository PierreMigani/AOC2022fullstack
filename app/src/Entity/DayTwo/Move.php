<?

namespace Entity\DayTwo;

abstract class Move {
    public function __construct(
        private int $points,
        private string $strongerMoveClassname,
        private string $weakerMoveClassname,
    )
    {}

    public function getPoints(): int
    {
        return $this->points;
    }

    public function winAgainst(Move $move): int
    {
        // Win
        if ($move instanceof $this->weakerMoveClassname) {
            return 1;
        }

        // Lose
        if ($move instanceof $this->strongerMoveClassname) {
            return -1;
        }

        // Draw
        return 0;
    }

    public function getStrongerMoveClassname(): string
    {
        return $this->strongerMoveClassname;
    }

    public function getWeakerMoveClassname(): string
    {
        return $this->weakerMoveClassname;
    }
}
