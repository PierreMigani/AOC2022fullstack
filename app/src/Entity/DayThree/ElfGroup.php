<?php

namespace Entity\DayThree;

class ElfGroup
{
    public function __construct(
        private Rucksack $firstRucksack,
        private Rucksack $secondRucksack,
        private Rucksack $thirdRucksack,
    ) {}

    public function getBadge(): ?Item
    {
        $sameItems = $this->firstRucksack->getSameItems($this->secondRucksack->getAllItems());
        $sameItems = $this->thirdRucksack->getSameItems($sameItems);
    
        // first same item is the badge (should be only one)
        return array_shift($sameItems);
    }
}
