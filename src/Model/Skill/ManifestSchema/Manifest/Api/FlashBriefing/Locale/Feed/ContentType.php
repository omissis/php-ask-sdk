<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed;

/*final */class ContentType
{
    public const ALLOWED_CONTENT_TYPES = [
        'TEXT', // Indicates the content of the feed is text to be read by Alexa.
        'AUDIO', // Indicates the content of the feed audio content to be played by Alexa
    ];

    /**
     * @var string
     */
    private $contentType;

    /**
     * @throws InvalidContentTypeException
     */
    public function __construct(string $contentType)
    {
        if (!in_array($contentType, self::ALLOWED_CONTENT_TYPES, true)) {
            throw new InvalidContentTypeException($contentType);
        }

        $this->contentType = $contentType;
    }

    public function __toString(): string
    {
        return $this->contentType;
    }
}
