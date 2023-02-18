<?php

namespace Entity\DayFive;

class Ship {

    private array $crateStacks = [];
    private ?array $savedCrateStacks = null;
    private ?AbstractCrane $crane;

    public function __construct(
    ) {
        $this->crane = null;
    }

    public function setCrane(AbstractCrane $crane): void
    {
        $this->crane = $crane;
    }

    public function addCrateStack(CrateStack $crateStack, string $name): void
    {
        $this->crateStacks[$name] = $crateStack;
    }

    public function getCrateStack(string $name): ?CrateStack
    {
        return $this->crateStacks[$name] ?? null;
    }

    public function getTopStacksNames(): string
    {
        $topStacksNames = [];

        foreach ($this->crateStacks as $crateStack) {
            $topCrate = $crateStack->getTopCrate();
            if ($topCrate !== null) {
                $topStacksNames[] = $topCrate->getName();
            }
        }

        return implode('', $topStacksNames);
    }

    public function executeOrder(MoveOrder $order)
    {
        $this->crane?->moveCrates(
            $order->getCrateAmount(),
            $order->getSourceStackName(),
            $order->getDestinationStackName()
        );
    }

    public function saveState(): void
    {
        // clone all objects from array
        $this->savedCrateStacks = array_map(
            fn($crateStack) => clone $crateStack,
            $this->crateStacks
        );
    }

    public function restoreState(): void
    {
        if ($this->savedCrateStacks !== null) {
            $this->crateStacks = array_map(
                fn($crateStack) => clone $crateStack,
                $this->savedCrateStacks
            );
        }
    }
}
