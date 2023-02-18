<?php

namespace Entity\DaySix;

class StartOfPacketDetectorSubroutine extends AbstractMarkerDetector {
    public function __construct(
        private Device $device
    )
    {
        // start of packet marker is 4 characters long
        parent::__construct($device, 4);
    }
}
