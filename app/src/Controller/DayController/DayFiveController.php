<?php

namespace Controller\DayController;

use Controller\DayController;
use Factory\StreamFactory;
use Service\DayFiveService;
use League\Plates\Engine;

class DayFiveController extends DayController {
    public function __construct(Engine $templateEngine, StreamFactory $streamFactory) {
        $service = new DayFiveService();

        parent::__construct('/day5', $service, $streamFactory, $templateEngine, 'Day Five');
    }
}
