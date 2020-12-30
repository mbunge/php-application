<?php

namespace Mbunge\PhpApplication\Event;

use Mbunge\PhpApplication\Controller\Controller;
use Mbunge\PhpApplication\Controller\InitiateController;
use Mbunge\PhpApplication\Event\Event\InputHandled;
use Mbunge\PhpApplication\Event\Event\OutputHandled;
use Mbunge\PhpApplication\Event\Event\ControllerInitiated;
use Psr\EventDispatcher\EventDispatcherInterface;

/**
 * The controller dispatches events
 *
 * Class EventDispatcherApplicationFacade
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpApplication\Event;
 */
class EventDispatcherControllerDecorator implements Controller, InitiateController
{

    public function __construct(
        private EventDispatcherInterface $eventDispatcher,
        private Controller $controller
    )
    {
    }

    /**
     * @param Controller $parent
     * @return Controller
     */
    public function init(Controller $parent): Controller
    {
        /** @var ControllerInitiated $event */
        $event = $this->eventDispatcher->dispatch(new ControllerInitiated($parent));

        return $event->getController();
    }

    /**
     * 1. delegates input to input event
     * 2. execute controller with input from input event
     * 3. delegate controller output to output event
     * @param object $input
     * @return object
     */
    public function execute(object $input): object
    {
        /** @var InputHandled $inputEvent */
        $inputEvent = $this->eventDispatcher->dispatch(new InputHandled($input));

        $output = $this->controller->execute($inputEvent->getInput());

        /** @var OutputHandled $outputEvent */
        $outputEvent = $this->eventDispatcher->dispatch(new OutputHandled($output));
        return $outputEvent->getOutput();
    }
}
