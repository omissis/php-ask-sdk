<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Uri;

/*final */class Url
{
    /**
     * An HTTP/HTTPS URL.
     *
     * @var string
     */
    private $url;

    /**
     * @throws InvalidUriException
     */
    public function __construct(string $url)
    {
        if ($url === '') {
            throw new InvalidUriException($url);
        }

        $this->url = $url;
    }

    public function __toString(): string
    {
        return $this->url;
    }
}
