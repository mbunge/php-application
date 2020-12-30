<?php

namespace Mbunge\PhpApplication\Event\Event;

/**
 * Class HandleInputEvent
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpApplication\Event\Events;
 */
class InputHandled
{
    public function __construct(public object $input)
    {
    }

    /**
     * @return object
     */
    public function getInput(): object
    {
        return $this->input;
    }

    /**
     * @param object $input
     */
    public function setInput(object $input): void
    {
        $this->input = $input;
    }

}
