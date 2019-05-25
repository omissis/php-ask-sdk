<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Uri;

use Omissis\AlexaSdk\Sdk\Exception;

/*final */class InvalidUriException extends Exception
{
    /**
     * @var string
     */
    private $invalidUri;

    public function __construct(string $invalidUri)
    {
        $this->invalidUri = $invalidUri;

        parent::__construct(sprintf('Invalid URI: "%s".', $invalidUri));
    }

    public function getInvalidUri(): string
    {
        return $this->invalidUri;
    }
}
