<?php

namespace Controller\DayController;

use Controller\DayController;
use Factory\StreamFactory;
use Service\Day7Service;
use League\Plates\Engine;

class Day7Controller extends DayController {
    public function __construct(Engine $templateEngine, StreamFactory $streamFactory) {
        $service = new Day7Service();

        parent::__construct(
            '/day7',
            $service,
            $streamFactory,
            $templateEngine,
            'No Space Left On Device'
        );
    }
}
