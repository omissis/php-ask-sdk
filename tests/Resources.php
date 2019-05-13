<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests;

final class Resources
{
    /**
     * @throws TestResourceNotFoundException
     * @throws InvalidTestResourceException
     */
    public static function getContent(string $resourceName): string
    {
        $resourcePath = __DIR__ . DIRECTORY_SEPARATOR . 'Resources' . DIRECTORY_SEPARATOR . $resourceName;

        if (!file_exists($resourcePath)) {
            throw new TestResourceNotFoundException($resourceName);
        }

        $content = file_get_contents($resourcePath);

        if ($content === false) {
            throw new InvalidTestResourceException($resourceName);
        }

        return $content;
    }
}
