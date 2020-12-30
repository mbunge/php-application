<?php

namespace Mbunge\PhpApplication\Event\Attribute;

use Attribute;

/**
 * Class SubscribeToAttribute
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpApplication\Event;
 */
#[Attribute]
class SubscribeTo
{

    /**
     * SubscribeToAttribute constructor.
     * @param string $event
     */
    public function __construct(
        public string $event
    )
    {
    }
}
