<?php

namespace Mbunge\PhpApplication\Controller;

/**
 * Application controller executes application logic
 *
 * Logic depend on field of use
 * - Front-Controller
 * - middleware handler
 * - use-case handler
 * - interactor handler
 *
 * Class ApplicationController
 * @copyright Marco Bunge <marco_bunge@web.de>
 * @package Mbunge\PhpApplication;
 */
interface Controller
{
    public function execute(object $input): object;
}
