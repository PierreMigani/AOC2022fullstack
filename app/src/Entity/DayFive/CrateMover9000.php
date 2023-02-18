<?php

namespace Entity\DayFive;

class CrateMover9000 extends AbstractCrane {
    public function __construct(
        protected Ship $ship,
    ) {
        // this crane can only move 1 crate at a time
        parent::__construct($ship, 1);
    }

    public function moveCrates(
        int $nbCrates,
        string $fromStackName,
        string $toStackName
    ): void
    {
        $fromCrateStack = $this->ship->getCrateStack($fromStackName);
        $toCrateStack = $this->ship->getCrateStack($toStackName);

        if ($fromCrateStack !== null && $toCrateStack !== null) {
            for ($i = 0; $i < $nbCrates; $i++) {
                $this->extractCrates($fromStackName);
                $this->loadCrates($toStackName);
            }
        }
    }
}
