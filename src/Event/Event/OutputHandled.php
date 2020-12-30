<?php

namespace Mbunge\PhpApplication\Event\Event;

/**
 * Class HandleInputEvent
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpApplication\Event\Events;
 */
class OutputHandled
{
    public function __construct(public object $output)
    {
    }

    /**
     * @return object
     */
    public function getOutput(): object
    {
        return $this->output;
    }

    /**
     * @param object $output
     */
    public function setOutput(object $output): void
    {
        $this->output = $output;
    }

}
