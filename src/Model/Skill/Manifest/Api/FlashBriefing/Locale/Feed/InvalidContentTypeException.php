<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\FlashBriefing\Locale\Feed;

use Omissis\AlexaSdk\Model\Exception;

final class InvalidContentTypeException extends Exception
{
    /**
     * @var string
     */
    private $invalidContentType;

    public function __construct(string $invalidContentType)
    {
        $this->invalidContentType = $invalidContentType;

        parent::__construct(sprintf(
            'Invalid content type: "%s". Allowed values are: "%s".',
            $invalidContentType,
            implode('", "', ContentType::ALLOWED_CONTENT_TYPES)
        ));
    }

    public function getInvalidContentType(): string
    {
        return $this->invalidContentType;
    }
}
