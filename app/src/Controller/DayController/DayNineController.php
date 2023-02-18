<?php

namespace Controller\DayController;

use Controller\DayController;
use Factory\StreamFactory;
use League\Plates\Engine;
use Service\DayNineService;

class DayNineController extends DayController {
    public function __construct(Engine $templateEngine, StreamFactory $streamFactory) {
        $service = new DayNineService();

        parent::__construct('/day9', $service, $streamFactory, $templateEngine, 'Rope Bridge');
    }
}
