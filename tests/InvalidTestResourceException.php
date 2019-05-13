<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests;

final class InvalidTestResourceException extends \LogicException
{
    public function __construct(string $resourceName)
    {
        parent::__construct(sprintf('Cannot load resource content: "%s".', $resourceName));
    }
}
