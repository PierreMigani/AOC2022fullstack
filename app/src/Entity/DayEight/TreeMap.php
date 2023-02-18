<?php

namespace Entity\DayEight;

class TreeMap
{
    private array $treeMap;

    public function __construct()
    {
        $this->treeMap = [];
    }

    public function addTree(Tree $tree, int $x, int $y): void
    {
        $this->treeMap[$y][$x] = $tree;

        // Set the neighbours of the tree
        $tree->setEast($this->getTree($x + 1, $y));
        $tree->setWest($this->getTree($x - 1, $y));
        $tree->setNorth($this->getTree($x, $y - 1));
        $tree->setSouth($this->getTree($x, $y + 1));
    }

    public function getTree(int $x, int $y): ?Tree
    {
        return $this->treeMap[$y][$x] ?? null;
    }

    public function getNbVisibleTrees(): int
    {
        $nbVisibleTrees = 0;
        foreach ($this->treeMap as $y => $trees) {
            foreach ($trees as $x => $tree) {
                if ($tree->isVisible()) {
                    $nbVisibleTrees++;
                }
            }
        }

        return $nbVisibleTrees;
    }

    public function getHighestScenicScore(): int
    {
        $highestScenicScore = 0;
        foreach ($this->treeMap as $y => $trees) {
            foreach ($trees as $x => $tree) {
                $scenicScore = $tree->getScenicScore();
                if ($scenicScore > $highestScenicScore) {
                    $highestScenicScore = $scenicScore;
                }
            }
        }

        return $highestScenicScore;
    }
}
