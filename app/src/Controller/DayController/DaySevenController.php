<?php

namespace Controller\DayController;

use Controller\DayController;
use Factory\StreamFactory;
use Service\DaySevenService;
use League\Plates\Engine;

class DaySevenController extends DayController {
    public function __construct(Engine $templateEngine, StreamFactory $streamFactory) {
        $service = new DaySevenService();

        parent::__construct('/day7', $service, $streamFactory, $templateEngine, 'No Space Left On Device');
    }
}
