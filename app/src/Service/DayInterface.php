<?php

namespace Service;

interface DayInterface {
    public function parse(array $inputLines): void;

    public function computePartOne(): int;

    public function computePartTwo(): int;
}
