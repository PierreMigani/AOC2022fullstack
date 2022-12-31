<?php

namespace Service;

use Entity\DayThree\ElfGroup;
use Entity\DayThree\Rucksack;
use Factory\DayThree\ItemFactory;

class DayThreeService implements DayInterface
{
    private array $rucksacks;
    private ItemFactory $itemFactory;

    public function __construct() {
        $this->rucksacks = [];
        $this->itemFactory = new ItemFactory();
    }

    public function parse(array $inputLines): void {
        foreach ($inputLines as $line) {
            $rucksack = new Rucksack(
                $this->itemFactory,
                2
            );

            // split line string in half, for each compartment
            $splittedCompartmentItemsRaw = str_split($line, strlen($line) / 2);
            foreach ($splittedCompartmentItemsRaw as $compartmentIndex => $compartmentItemsRaw) {
                $compartment = $rucksack->getCompartment($compartmentIndex);
                if (!$compartment) {
                    continue;
                }

                // split each compartment string in items
                $compartmentItemsRaw = str_split($compartmentItemsRaw);
                foreach ($compartmentItemsRaw as $itemType) {
                    $compartment->addItem($itemType);
                }
            }

            $this->rucksacks[] = $rucksack;
        }
    }

    public function computePartOne(): int {
        $prioritySum = 0;
        foreach ($this->rucksacks as $rucksack) {
            $compartmentOne = $rucksack->getCompartment(0);
            $compartmentTwo = $rucksack->getCompartment(1);

            if (!$compartmentOne || !$compartmentTwo) {
                continue;
            }

            $sameItems = $compartmentOne->getSameItems($compartmentTwo);
            foreach ($sameItems as $item) {
                $prioritySum += $item->getPriority();
            }
        }

        return $prioritySum;
    }

    public function computePartTwo(): int {
        $prioritySum = 0;
        
        // split rucksacks in group of 3
        $rucksackGroups = array_chunk($this->rucksacks, 3);

        foreach ($rucksackGroups as $rucksacks) {
            if (count($rucksacks) !== 3) {
                continue;
            }

            $elfGroup = new ElfGroup(...$rucksacks);
            $groupBadge = $elfGroup->getBadge();
            $prioritySum += $groupBadge->getPriority();
        }

        return $prioritySum;
    }
}
