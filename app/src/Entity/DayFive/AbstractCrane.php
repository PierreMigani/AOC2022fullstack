<?php

namespace Entity\DayFive;

abstract class AbstractCrane {
    protected array $currentCrates;

    public function __construct(
        protected Ship $ship,
        protected ?int $maxSelectableCrates = null,
    ) {
        $this->currentCrates = [];
    }

    public function extractCrates(string $stackName, int $nbCrates = 1): void
    {
        if ($this->maxSelectableCrates && $nbCrates > $this->maxSelectableCrates) {
            return;
        }

        if (!empty($this->currentCrates)) {
            return;
        }

        $crateStack = $this->ship->getCrateStack($stackName);
        if ($crateStack !== null) {
            for ($i = 0; $i < $nbCrates; $i++) {
                $crate = $crateStack->shiftCrate();
                if ($crate !== null) {
                    $this->currentCrates[] = $crate;
                }
            }
        }
    }

    public function loadCrates(string $stackName)
    {
        $crateStack = $this->ship->getCrateStack($stackName);
        if ($crateStack !== null) {
            while (!empty($this->currentCrates)) {
                $crate = array_pop($this->currentCrates);
                $crateStack->unshiftCrate($crate);
            }
        } 
    }

    abstract public function moveCrates(
        int $nbCrates,
        string $fromStackName,
        string $toStackName
    ): void;
}
