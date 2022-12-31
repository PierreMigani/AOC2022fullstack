<?php

namespace Controller\DayController;

use Controller\DayController;
use Factory\StreamFactory;
use Service\DayOneService;
use League\Plates\Engine;

class DayOneController extends DayController {
    public function __construct(Engine $templateEngine, StreamFactory $streamFactory) {
        $service = new DayOneService();

        parent::__construct('/day1', $service, $streamFactory, $templateEngine, 'Day One');
    }
}
