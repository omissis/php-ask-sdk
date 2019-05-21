<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Region;

use Omissis\AlexaSdk\Model\Uri\Uri;

final class Upchannel
{
    /**
     * Use "SNS" for this field
     *
     * @var Upchannel\Type
     */
    private $type;

    /**
     * SNS Amazon Resource Name (ARN) for video skill through which video partner can send events to Alexa
     *
     * @var null|Uri
     */
    private $uri;

    public function __construct(Upchannel\Type $type, ?Uri $uri = null)
    {
        $this->type = $type;
        $this->uri = $uri;
    }

    public function getType(): Upchannel\Type
    {
        return $this->type;
    }

    public function getUri(): ?Uri
    {
        return $this->uri;
    }
}
