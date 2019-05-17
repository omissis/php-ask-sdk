<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\AlexaForBusiness;

use Omissis\AlexaSdk\Model\Uri\Uri;

final class Endpoint
{
    /**
     * The Amazon Resource Name (ARN) of the Lambda function, or the HTTPS URL for a custom endpoint.
     *
     * @var Uri
     */
    private $uri;

    public function __construct(Uri $uri)
    {
        $this->uri = $uri;
    }

    public function getUri(): Uri
    {
        return $this->uri;
    }
}
