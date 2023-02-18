<?php

namespace Entity\DayFive;

class CrateMover9001 extends AbstractCrane {
    public function __construct(
        protected Ship $ship,
    ) {
        // this crane can move as many crates as it wants
        parent::__construct($ship, null);
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
            $this->extractCrates($fromStackName, $nbCrates);
            $this->loadCrates($toStackName, $nbCrates);
        }
    }
}
