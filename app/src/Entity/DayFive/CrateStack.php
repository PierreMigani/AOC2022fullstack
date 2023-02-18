<?php

namespace Entity\DayFive;

class CrateStack {
    private array $crates = [];

    public function unshiftCrate(Crate $crate): void
    {
        array_unshift($this->crates, $crate);
    }

    public function unshiftCrates(array $crates): void
    {
        while (!empty($crates)) {
            $crate = array_pop($crates);
            if ($crate instanceof Crate) {
                $this->unshiftCrate($crate);
            }
        }
    }

    public function shiftCrate(): ?Crate
    {
        return array_shift($this->crates);
    }

    public function shiftCrates(int $nbCrates): array
    {
        $crates = [];
        for ($i = 0; $i < $nbCrates; $i++) {
            $crates[] = $this->shiftCrate();
        }

        return $crates;
    }

    public function pushCrate(Crate $crate): void
    {
        array_push($this->crates, $crate);
    }

    public function getTopCrate(): ?Crate
    {
        return $this->crates[0] ?? null;
    }
}
