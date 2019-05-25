<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\Video;

use Omissis\AlexaSdk\Model\Uri\Uri;

/*final */class Endpoint
{
    /**
     * Amazon Resource Name (ARN) for the skill's video AWS Lambda function.
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
