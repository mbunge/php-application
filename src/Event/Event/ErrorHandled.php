<?php

namespace Mbunge\PhpApplication\Event\Event;

use Throwable;

/**
 * Class ErrorHandled
 * @package Mbunge\PhpApplication\Event\Event;
 */
class ErrorHandled
{

    private bool $catchable = false;

    public function __construct(private Throwable $throwable)
    {
    }

    /**
     * @return Throwable
     */
    public function getThrowable(): Throwable
    {
        return $this->throwable;
    }

    /**
     * @param Throwable $throwable
     */
    public function setThrowable(Throwable $throwable): void
    {
        $this->throwable = $throwable;
    }

    /**
     * @return bool
     */
    public function isCatchable(): bool
    {
        return $this->catchable;
    }

    /**
     * @param bool $catchable
     */
    public function setCatchable(bool $catchable): void
    {
        $this->catchable = $catchable;
    }
}
