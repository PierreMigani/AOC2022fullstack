<?php

namespace Controller\DayController;

use Controller\DayController;
use Factory\StreamFactory;
use League\Plates\Engine;
use Service\Day8Service;

class Day8Controller extends DayController {
    public function __construct(Engine $templateEngine, StreamFactory $streamFactory) {
        $service = new Day8Service();

        parent::__construct(
            '/day8',
            $service,
            $streamFactory,
            $templateEngine,
            'Treetop Tree House'
        );
    }
}
