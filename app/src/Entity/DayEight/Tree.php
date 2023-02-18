<?php

namespace Entity\DayEight;

class Tree
{
    private array $sideTrees;

    public function __construct(
        private int $height,
    ) {
        $this->sideTrees = [];
    }

    public function getHeight(): int {
        return $this->height;
    }

    public function setSide(string $side, ?Tree $tree): void {
        $this->sideTrees[$side] = $tree;
    }

    public function getSide(string $side): ?Tree {
        return $this->sideTrees[$side] ?? null;
    }

    public function getSideNames(): array {
        return array_keys($this->sideTrees);
    }

    public function getSides(): array {
        return $this->sideTrees;
    }

    public function getEast(): ?Tree {
        return $this->getSide('east');
    }

    public function getWest(): ?Tree {
        return $this->getSide('west');
    }

    public function getNorth(): ?Tree {
        return $this->getSide('north');
    }

    public function getSouth(): ?Tree {
        return $this->getSide('south');
    }

    public function setEast(?Tree $tree): void {
        $this->setSide('east', $tree);
        if ($tree) {
            $tree->setSide('west', $this);
        }
    }

    public function setWest(?Tree $tree): void {
        $this->setSide('west', $tree);
        if ($tree) {
            $tree->setSide('east', $this);
        }
    }

    public function setNorth(?Tree $tree): void {
        $this->setSide('north', $tree);
        if ($tree) {
            $tree->setSide('south', $this);
        }
    }

    public function setSouth(?Tree $tree): void {
        $this->setSide('south', $tree);
        if ($tree) {
            $tree->setSide('north', $this);
        }
    }

    public function isVisible(): bool {
        $sides = $this->getSides();
        // If any of the neighbours trees is null, 
        // then the current tree is at the edge of the map, therefore it is visible
        foreach ($sides as $side) {
            if ($side === null) {
                return true;
            }
        }

        // Check each side of the tree
        $sideNames = $this->getSideNames();
        foreach ($sideNames as $sideName) {
            // If any of this side trees are taller or same height than this tree,
            // then this tree is not visible from this side
            $currentTree = $this->getSide($sideName);
            while ($currentTree) {
                if ($currentTree->getHeight() >= $this->getHeight()) {
                    break;
                }
                $currentTree = $currentTree->getSide($sideName);
            }

            // If we have reached the edge of the map, then this tree is visible
            if ($currentTree === null) {
                return true;
            }
        }

        // If we have reached this point, then this tree is not visible
        return false;
    }

    public function getScenicScore(): int
    {
        // Scenic score is a multiplication of each side's number of viewable trees
        $scenicScore = 1;

        // get the number of viewable trees for each side
        $sideNames = $this->getSideNames();
        foreach ($sideNames as $sideName) {
            $nbViewableTrees = 0;
            // If any of this side trees are taller or same height than this tree,
            // then when can't see any further trees from this side
            $currentTree = $this->getSide($sideName);
            while ($currentTree) {
                $nbViewableTrees++;
                if ($currentTree->getHeight() >= $this->getHeight()) {
                    break;
                }
                $currentTree = $currentTree->getSide($sideName);
            }

            $scenicScore *= $nbViewableTrees;
        }

        return $scenicScore;
    }
}
