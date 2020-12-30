<?php

namespace Mbunge\PhpApplication;

use Mbunge\PhpApplication\Controller\Controller;
use Mbunge\PhpApplication\Controller\InitiateController;

/**
 * The Application acts as some kind of front controller and
 * initiates and execute a controller for a specific context like HTTP, CLI, etc.
 *
 * The application is not aware of concrete implementation details of controller
 *
 * Class Application
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpApplication;
 */
final class Application implements Controller
{
    /**
     * Application constructor.
     * @param Controller $controller
     */
    public function __construct(
        private Controller $controller
    )
    {
        if($this->controller instanceof InitiateController) {
            $this->controller->init($this);
        }
    }

    /**
     * @param object $input
     * @return object
     */
    public function execute(object $input): object {
        return $this->controller->execute($input);
    }

}
