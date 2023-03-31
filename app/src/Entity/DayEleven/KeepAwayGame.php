<?php

namespace Entity\DayEleven;

class KeepAwayGame
{
    private array $monkeys;

    public function __construct()
    {
        $this->monkeys = [];
    }

    public function addMonkey(Monkey $monkey): void
    {
        $this->monkeys[] = $monkey;
    }

    public function play(int $nbRounds): void
    {
        for ($i = 0; $i < $nbRounds; $i++) {
            $this->playRound();
        }
    }

    private function playRound(): void
    {
        foreach ($this->monkeys as $monkey) {
            $monkey->play();
        }
    }
}
