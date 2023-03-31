<?php

namespace Controller\DayController;

use Controller\DayController;
use Factory\StreamFactory;
use Service\Day6Service;
use League\Plates\Engine;

class Day6Controller extends DayController {
    public function __construct(Engine $templateEngine, StreamFactory $streamFactory) {
        $service = new Day6Service();

        parent::__construct(
            '/day6',
            $service,
            $streamFactory,
            $templateEngine,
            'Tuning Trouble'
        );
    }
}
