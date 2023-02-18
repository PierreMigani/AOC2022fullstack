<?php

namespace Entity\DayFour;

class CleaningAssignment
{
    public function __construct(
        private array $sectorIds,
    ) {}

    public function getSectorIds(): array
    {
        return $this->sectorIds;
    }

    public function fullyContains(CleaningAssignment $other): bool
    {
        foreach ($other->getSectorIds() as $otherSectorId) {
            if (!in_array($otherSectorId, $this->sectorIds)) {
                return false;
            }
        }

        return true;
    }

    public function partiallyContains(CleaningAssignment $other): bool
    {
        foreach ($other->getSectorIds() as $otherSectorId) {
            if (in_array($otherSectorId, $this->sectorIds)) {
                return true;
            }
        }

        return false;
    }
}
