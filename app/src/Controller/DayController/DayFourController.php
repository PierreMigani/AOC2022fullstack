<?php

namespace Controller\DayController;

use Controller\DayController;
use Factory\StreamFactory;
use Service\DayFourService;
use League\Plates\Engine;

class DayFourController extends DayController {
    public function __construct(Engine $templateEngine, StreamFactory $streamFactory) {
        $service = new DayFourService();

        parent::__construct('/day4', $service, $streamFactory, $templateEngine, 'Day Four');
    }
}
