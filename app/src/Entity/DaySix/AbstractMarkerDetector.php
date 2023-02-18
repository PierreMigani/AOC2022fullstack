<?php

namespace Entity\DaySix;

abstract class AbstractMarkerDetector {
    public function __construct(
        private Device $device,
        private int $markerLength,
    )
    {}

    // function to find the first $markerLength characters 
    // in the datastream with no duplicates
    public function run(): ?int
    {
        $currentMarker = [];
        $markerIndex = 0;
        do {
            // get next data from device
            $data = $this->device->sendData();

            // search for duplicate in current marker
            $foundKey = array_search($data, $currentMarker);
            if ($foundKey !== false) {
                // if any duplicate, remove stocked data from first data to found duplicate
                $currentMarker = array_slice($currentMarker, $foundKey + 1);
            }
            $currentMarker[] = $data;
            $markerIndex++;
        } while (count($currentMarker) < $this->markerLength && $data !== null);

        // if data is null,
        // we reached the end of the datastream without finding a complete marker
        return $data === null ? null : $markerIndex;
    }
}
