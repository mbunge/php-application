<?php

namespace Mbunge\PhpApplication\Controller;

/**
 * Application controller is aware of concrete environment like HTTP, CLI.
 *
 * Furthermore application controller is able to deal with frameworks
 * like DI-Containers, routers, event dispatches, API-Clients etc.
 *
 * Class ApplicationFacade
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpApplication;
 */
interface InitiateController
{

    /**
     * @param Controller $application
     * @return Controller
     */
    public function init(Controller $application): Controller;
}
