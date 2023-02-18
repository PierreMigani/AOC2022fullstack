<?php

namespace Controller\DayController;

use Controller\DayController;
use Factory\StreamFactory;
use Service\DaySixService;
use League\Plates\Engine;

class DaySixController extends DayController {
    public function __construct(Engine $templateEngine, StreamFactory $streamFactory) {
        $service = new DaySixService();

        parent::__construct('/day6', $service, $streamFactory, $templateEngine, 'Tuning Trouble');
    }
}
