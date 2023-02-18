<?php

namespace Factory;

use Controller\BaseController;
use Controller\DayController\DayEightController;
use Controller\DayController\DayFiveController;
use Controller\DayController\DayFourController;
use Controller\DayController\DayNineController;
use Controller\DayController\DayOneController;
use Controller\DayController\DaySevenController;
use Controller\DayController\DaySixController;
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
            case '/day4':
                return new DayFourController($this->templateEngine, $this->streamFactory);
            case '/day5':
                return new DayFiveController($this->templateEngine, $this->streamFactory);
            case '/day6':
                return new DaySixController($this->templateEngine, $this->streamFactory);
            case '/day7':
                return new DaySevenController($this->templateEngine, $this->streamFactory);
            case '/day8':
                return new DayEightController($this->templateEngine, $this->streamFactory);
            case '/day9':
                return new DayNineController($this->templateEngine, $this->streamFactory);
            default:
                throw new \Exception('Controller not found');
        }
    }
}
