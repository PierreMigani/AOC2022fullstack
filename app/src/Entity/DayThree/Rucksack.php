<?php

namespace Entity\DayThree;

use Factory\DayThree\ItemFactory;

class Rucksack
{
    private array $compartments = [];

    public function __construct(
        ItemFactory $itemFactory,
        int $compartmentCount
    )
    {
        for ($i = 0; $i < $compartmentCount; $i++) {
            $this->compartments[] = new Compartment($itemFactory);
        }
    }

    public function getCompartment(int $index): ?Compartment
    {
        return $this->compartments[$index] ?? null;
    }

    public function getAllItems(): array
    {
        $allItems = [];
        foreach ($this->compartments as $compartment) {
            $allItems = array_merge($allItems, $compartment->getItems());
        }

        return $allItems;
    }

    public function getSameItems(array $otherItems): array
    {
        $items = $this->getAllItems();
        $sameItems = [];

        foreach ($items as $item) {
            if (is_a($item, Item::class) && isset($otherItems[$item->getType()])) {
                $sameItems[$item->getType()] = $item;
            }
        }

        return $sameItems;
    }
}
