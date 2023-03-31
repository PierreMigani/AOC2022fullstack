<?php

namespace Controller\DayController;

use Controller\DayController;
use Factory\StreamFactory;
use Service\Day1Service;
use League\Plates\Engine;

class Day1Controller extends DayController {
    public function __construct(Engine $templateEngine, StreamFactory $streamFactory) {
        $service = new Day1Service();

        parent::__construct(
            '/day1',
            $service,
            $streamFactory,
            $templateEngine,
            'Calorie Counting'
        );
    }
}
