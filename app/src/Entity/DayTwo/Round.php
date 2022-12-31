<?

namespace Entity\DayTwo;

class Round {
    public function __construct(
        private Move $advMove,
        private Move $yourMove,
    ) {}

    public function isWin(): int
    {
        return $this->yourMove->winAgainst($this->advMove);
    }

    public function getYourPoints(): int
    {
        $roundPoints = $this->yourMove->getPoints();
        switch($this->isWin()) {
            case 1:
                $winningPoints = 6;
                break;
            case 0:
                $winningPoints = 3;
                break;
            case -1:
            default:
                $winningPoints = 0;
                break;
        }

        return $roundPoints + $winningPoints;
    }
}
