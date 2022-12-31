<?php

namespace Controller\DayController;

use Controller\DayController;
use Factory\StreamFactory;
use League\Plates\Engine;
use Service\DayThreeService;

class DayThreeController extends DayController {
    public function __construct(Engine $templateEngine, StreamFactory $streamFactory) {
        $service = new DayThreeService();

        parent::__construct('/day3', $service, $streamFactory, $templateEngine, 'Day Three');
    }
}
