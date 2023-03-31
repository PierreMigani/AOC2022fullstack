<?php

namespace Service;

use Entity\DayFive\Crate;
use Entity\DayFive\CrateMover9000;
use Entity\DayFive\CrateMover9001;
use Entity\DayFive\CrateStack;
use Entity\DayFive\MoveOrder;
use Entity\DayFive\Ship;

class Day5Service implements DayInterface {
    private Ship $ship;
    private array $moveOrders = [];

    public function __construct(
    ) {
        $this->ship = new Ship();
    }

    public function parse(array $inputLines): void {
        // first construct the stacks
        $shipStacks = [];
        $cratesLines = [];
        while ($inputLines && $inputLines[0] !== '') {
            $cratesLines[] = array_shift($inputLines);
        }

        $stackNamesLine = array_pop($cratesLines);
        $stackNames = explode('   ', $stackNamesLine);
        foreach ($stackNames as $stackName) {
            $stackName = trim($stackName, ' ');
            $stack = new CrateStack();
            $this->ship->addCrateStack($stack, $stackName);
            $shipStacks[] = $stack;
        }

        // then create and add the crates to the stacks
        foreach ($cratesLines as $cratesLine) {
            // split the line by 4 characters
            $rawCrates = str_split($cratesLine, 4);            

            // create the crates, extract names between '[' and ']'
            $crateNames = array_map(fn($rawCrate) => trim($rawCrate, " []"), $rawCrates);
            
            $crates = array_map(
                fn($crateName) =>
                    $crateName ?
                    (new Crate($crateName)) :
                    null,
                $crateNames
            );

            // add the crates to the stacks
            foreach ($crates as $crate) {
                $stack = array_shift($shipStacks);
                if ($crate) {
                    $stack->pushCrate($crate);
                }
                $shipStacks[] = $stack;
            }
        }

        // finally, parse the move orders (the remaining lines)
        while ($inputLines) {
            $orderRaw = array_shift($inputLines);

            // only extract numbers from orderRaw
            preg_match_all('/\d+/', $orderRaw, $orderValues);

            if (count($orderValues[0]) === 3) {
                // convert the raw numbers to integers
                $orderValues = array_map('intval', $orderValues[0]);
                $this->moveOrders[] = new MoveOrder(...$orderValues);
            }
        }

        $this->ship->saveState();
    }
    
    public function computePartOne(): string {
        $this->ship->restoreState();

        $crane = new CrateMover9000($this->ship);
        $this->ship->setCrane($crane);

        foreach ($this->moveOrders as $moveOrder) {
            $this->ship->executeOrder($moveOrder);
        }

        return $this->ship->getTopStacksNames();
    }

    public function computePartTwo(): string
    {
        $this->ship->restoreState();

        $crane = new CrateMover9001($this->ship);
        $this->ship->setCrane($crane);

        foreach ($this->moveOrders as $moveOrder) {
            $this->ship->executeOrder($moveOrder);
        }

        return $this->ship->getTopStacksNames();
    }
}
