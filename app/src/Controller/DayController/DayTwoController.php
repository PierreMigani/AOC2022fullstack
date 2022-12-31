<?php

namespace Controller\DayController;

use Controller\DayController;
use Factory\StreamFactory;
use Service\DayTwoService;
use League\Plates\Engine;

class DayTwoController extends DayController {
    public function __construct(Engine $templateEngine, StreamFactory $streamFactory) {
        $service = new DayTwoService();

        parent::__construct('/day2', $service, $streamFactory, $templateEngine, 'Day Two');
    }
}
