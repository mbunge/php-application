<?php
/**
 * @copyright Marco Bunge <marco_bunge@web.de>
 */

namespace Mbunge\PhpAttributes\Tests\Unit\Event;

use League\Event\EventDispatcher;
use Mbunge\PhpApplication\Controller\Controller;
use Mbunge\PhpApplication\Event\Event\ControllerInitiated;
use Mbunge\PhpApplication\Event\Event\InputHandled;
use Mbunge\PhpApplication\Event\Event\OutputHandled;
use Mbunge\PhpApplication\Event\EventDispatcherControllerDecorator;
use PHPUnit\Framework\TestCase;

/**
 * Class EventDispatcherControllerDecoratorTest
 * @package Mbunge\PhpAttributes\Tests\Unit\Event
 * @copyright Marco Bunge <marco_bunge@web.de>
 */
class EventDispatcherControllerDecoratorTest extends TestCase
{

    public function testInit()
    {

        $controller = $this->createMock(Controller::class);
        $controller->method('execute')->willReturnArgument(0);

        $initiated = false;
        $dispatcher = new EventDispatcher();
        $dispatcher->subscribeTo(
            ControllerInitiated::class,
            function (ControllerInitiated $event) use (&$initiated) {
                $initiated = true;
            }
        );

        $controllerDecorator = new EventDispatcherControllerDecorator(
            $dispatcher,
            $controller
        );

        $controllerDecorator->init($controller);
        $this->assertTrue($initiated);
    }

    public function testExecute()
    {
        $controller = $this->createMock(Controller::class);
        $controller->method('execute')->willReturnArgument(0);

        $handleInput = false;
        $handleOutput = false;
        $dispatcher = new EventDispatcher();
        $dispatcher->subscribeTo(
            InputHandled::class,
            function (InputHandled $event) use (&$handleInput) {
                $handleInput = true;
                $input = $event->getInput();
                $input->inputHandled = true;
                $event->setInput($input);
            }
        );
        $dispatcher->subscribeTo(
            OutputHandled::class,
            function (OutputHandled $event) use (&$handleOutput) {
                $handleOutput = true;
                $output = $event->getOutput();
                $output->outputHandled = true;
                $event->setOutput($output);
            }
        );

        $controllerDecorator = new EventDispatcherControllerDecorator(
            $dispatcher,
            $controller
        );

        $input = (object)['message' => 'TEST MESSAGE'];

        $output = $controllerDecorator->execute($input);

        $this->assertTrue($handleInput);
        $this->assertTrue($handleOutput);
        $this->assertObjectNotHasAttribute('outputHandled', $input);
        $this->assertObjectNotHasAttribute('inputHandled', $input);
        $this->assertObjectHasAttribute('outputHandled', $output);
        $this->assertObjectHasAttribute('inputHandled', $output);
        $this->assertTrue($output->outputHandled);
        $this->assertTrue($output->inputHandled);
        $this->assertEquals('TEST MESSAGE', $output->message);
    }
}
