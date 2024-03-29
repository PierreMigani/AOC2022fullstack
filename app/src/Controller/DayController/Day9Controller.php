<?php

namespace Controller\DayController;

use Controller\DayController;
use Factory\StreamFactory;
use League\Plates\Engine;
use Service\Day9Service;

class Day9Controller extends DayController {
    public function __construct(Engine $templateEngine, StreamFactory $streamFactory) {
        $service = new Day9Service();

        parent::__construct(
            '/day9',
            $service,
            $streamFactory,
            $templateEngine,
            'Rope Bridge'
        );
    }
}
