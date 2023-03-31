<?php

namespace Controller\DayController;

use Controller\DayController;
use Factory\StreamFactory;
use League\Plates\Engine;
use Service\Day10Service;

class Day10Controller extends DayController {
    public function __construct(Engine $templateEngine, StreamFactory $streamFactory) {
        $service = new Day10Service();

        parent::__construct(
            '/day10',
            $service,
            $streamFactory,
            $templateEngine,
            'Cathode-Ray Tube',
            'results::day10'
        );
    }
}
