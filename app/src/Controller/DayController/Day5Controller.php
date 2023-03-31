<?php

namespace Controller\DayController;

use Controller\DayController;
use Factory\StreamFactory;
use Service\Day5Service;
use League\Plates\Engine;

class Day5Controller extends DayController {
    public function __construct(Engine $templateEngine, StreamFactory $streamFactory) {
        $service = new Day5Service();

        parent::__construct(
            '/day5',
            $service,
            $streamFactory,
            $templateEngine,
            'Supply Stacks'
        );
    }
}
