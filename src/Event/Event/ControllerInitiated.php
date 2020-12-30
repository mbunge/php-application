<?php

namespace Mbunge\PhpApplication\Event\Event;

use Mbunge\PhpApplication\Controller\Controller;

/**
 * Class ExampleEvent
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpApplication\Event\Events;
 */
class ControllerInitiated
{
    public function __construct(public Controller $controller)
    {
    }

    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }
}
