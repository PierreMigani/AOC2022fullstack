<?php

namespace Service;

use Entity\DayEight\Tree;
use Entity\DayEight\TreeMap;
use Service\DayInterface;

class DayEightService implements DayInterface {
    private TreeMap $treeMap;

    public function parse(array $inputLines): void
    {

        $currentRow = 0;
        $this->treeMap = new TreeMap();
        foreach ($inputLines as $line) {
            $currentColumn = 0;

            // each character is a tree height
            $rawTreeData = str_split($line);
            $treeHeights = array_map('intval', $rawTreeData);

            // create a tree for each height
            foreach ($treeHeights as $height) {
                $tree = new Tree($height);

                $this->treeMap->addTree(
                    $tree,
                    $currentColumn,
                    $currentRow
                );

                $currentColumn++;
            }

            $currentRow++;
        }

    }

    public function computePartOne(): int
    {
        return $this->treeMap->getNbVisibleTrees();
    }

    public function computePartTwo(): int
    {
        return $this->treeMap->getHighestScenicScore();
    }
}
