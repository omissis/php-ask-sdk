<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests;

final class TestResourceNotFoundException extends \LogicException
{
    public function __construct(string $resourceName)
    {
        parent::__construct(sprintf('Resource not found: "%s".', $resourceName));
    }
}
