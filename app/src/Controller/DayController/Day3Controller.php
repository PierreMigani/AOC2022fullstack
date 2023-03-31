<?php

namespace Controller\DayController;

use Controller\DayController;
use Factory\StreamFactory;
use League\Plates\Engine;
use Service\Day3Service;

class Day3Controller extends DayController {
    public function __construct(Engine $templateEngine, StreamFactory $streamFactory) {
        $service = new Day3Service();

        parent::__construct(
            '/day3',
            $service,
            $streamFactory,
            $templateEngine,
            'Rucksack Reorganization'
        );
    }
}
