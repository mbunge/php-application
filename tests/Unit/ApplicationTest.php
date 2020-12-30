<?php

namespace Mbunge\PhpAttributes\Tests\Unit;

use Mbunge\PhpApplication\Application;
use Mbunge\PhpApplication\Controller\Controller;
use PHPUnit\Framework\TestCase;

/**
 * Class ApplicationTest
 * @package Mbunge\PhpAttributes\Tests\Unit
 * @copyright Marco Bunge <marco_bunge@web.de>
 */
class ApplicationTest extends TestCase
{

    public function testExecute()
    {
        $app = new Application(
            new class implements Controller {

                public function execute(object $input): object
                {
                    return $input;
                }
            }
        );

        $input = (object)['message' => 'TEST MESSAGE'];

        $output = $app->execute($input);

        $this->assertObjectHasAttribute('message', $output);
        $this->assertEquals('TEST MESSAGE', $output->message);
    }
}
