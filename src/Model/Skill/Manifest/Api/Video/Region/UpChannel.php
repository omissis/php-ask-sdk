<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Region;

use Omissis\AlexaSdk\Model\Uri\Uri;

final class UpChannel
{
    /**
     * Use "SNS" for this field
     *
     * @var UpChannel\Type
     */
    private $type;

    /**
     * SNS Amazon Resource Name (ARN) for video skill through which video partner can send events to Alexa
     *
     * @var Uri
     */
    private $uri;

    public function __construct(UpChannel\Type $type, Uri $uri)
    {
        $this->type = $type;
        $this->uri = $uri;
    }

    public function getType(): UpChannel\Type
    {
        return $this->type;
    }

    public function getUri(): Uri
    {
        return $this->uri;
    }
}
