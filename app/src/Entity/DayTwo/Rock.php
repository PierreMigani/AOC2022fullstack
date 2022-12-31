<?

namespace Entity\DayTwo;

class Rock extends Move {
    public function __construct()
    {
        parent::__construct(
            points: 1,
            strongerMoveClassname: Paper::class,
            weakerMoveClassname: Scissors::class,
        );
    }
}
