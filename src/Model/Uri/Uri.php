<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Uri;

final class Uri
{
    /**
     * The Amazon Resource Name (ARN) of the Lambda function, or the HTTPS URL for a custom endpoint.
     *
     * @var string
     */
    private $uri;

    /**
     * @throws InvalidUriException
     */
    public function __construct(string $uri)
    {
        if (empty($uri)) {
            throw new InvalidUriException($uri);
        }

        $this->uri = $uri;
    }

    public function __toString(): string
    {
        return $this->uri;
    }
}
