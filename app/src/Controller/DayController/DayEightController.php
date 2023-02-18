<?php

namespace Controller\DayController;

use Controller\DayController;
use Factory\StreamFactory;
use League\Plates\Engine;
use Service\DayEightService;

class DayEightController extends DayController {
    public function __construct(Engine $templateEngine, StreamFactory $streamFactory) {
        $service = new DayEightService();

        parent::__construct('/day8', $service, $streamFactory, $templateEngine, 'Treetop Tree House');
    }
}
