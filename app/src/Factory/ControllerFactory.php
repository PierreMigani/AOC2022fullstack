<?php

namespace Factory;

use Controller\BaseController;
use Controller\DayController\DayOneController;
use Controller\DayController\DayThreeController;
use Controller\DayController\DayTwoController;
use Controller\HomeController;
use Factory\StreamFactory;
use League\Plates\Engine;

class ControllerFactory {
    public function __construct(
        private Engine $templateEngine,
        private StreamFactory $streamFactory,
    ) {}

    public function create(string $controllerName): BaseController {
        switch ($controllerName) {
            case '/':
                return new HomeController($this->streamFactory, $this->templateEngine);
            case '/day1':
                return new DayOneController($this->templateEngine, $this->streamFactory);
            case '/day2':
                return new DayTwoController($this->templateEngine, $this->streamFactory);
            case '/day3':
                return new DayThreeController($this->templateEngine, $this->streamFactory);
            default:
                throw new \Exception('Controller not found');
        }
    }
}
