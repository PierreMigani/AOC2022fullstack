<?php

namespace Controller\DayController;

use Controller\DayController;
use Factory\StreamFactory;
use Service\Day2Service;
use League\Plates\Engine;

class Day2Controller extends DayController {
    public function __construct(Engine $templateEngine, StreamFactory $streamFactory) {
        $service = new Day2Service();

        parent::__construct(
            '/day2',
            $service,
            $streamFactory,
            $templateEngine,
            'Rock Paper Scissors'
        );
    }
}
