<?php

namespace Controller\DayController;

use Controller\DayController;
use Factory\StreamFactory;
use Service\Day4Service;
use League\Plates\Engine;

class Day4Controller extends DayController {
    public function __construct(Engine $templateEngine, StreamFactory $streamFactory) {
        $service = new Day4Service();

        parent::__construct(
            '/day4',
            $service,
            $streamFactory,
            $templateEngine,
            'Camp Cleanup'
        );
    }
}
