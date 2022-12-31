<?php

namespace Entity\DayThree;

use Factory\DayThree\ItemFactory;

class Compartment 
{
    public function __construct(
        private ItemFactory $itemFactory,
        private array $items = [],
    ) {}

    public function addItem(string $itemType): void
    {
        $item = $this->items[$itemType] ??
            $this->itemFactory->create($itemType)
        ;

        if ($item) {
            $item->incQuantity();
            $this->items[$itemType] = $item;
        }
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function hasItem(string $itemType): bool
    {
        return isset($this->items[$itemType]);
    }

    public function getSameItems(Compartment $other): array
    {
        $sameItems = [];

        foreach ($this->items as $item) {
            if ($other->hasItem($item->getType())) {
                $sameItems[$item->getType()] = $item;
            }
        }

        return $sameItems;
    }
}
