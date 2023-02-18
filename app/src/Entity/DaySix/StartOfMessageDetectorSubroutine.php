<?php

namespace Entity\DaySix;

class StartOfMessageDetectorSubroutine extends AbstractMarkerDetector {
    public function __construct(
        private Device $device
    )
    {
        // start of message marker is 14 characters long
        parent::__construct($device, 14);
    }
}
