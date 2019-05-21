<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed;

final class Locale
{
    /**
     * @var string
     */
    private $customErrorMessage;

    /**
     * @var null|Feed[]
     */
    private $feeds;

    /**
     * @param null|Feed[] $feeds
     */
    public function __construct(string $customErrorMessage, ?array $feeds = null)
    {
        $this->customErrorMessage = $customErrorMessage;
        $this->feeds = $feeds;
    }

    public function getCustomErrorMessage(): string
    {
        return $this->customErrorMessage;
    }

    /**
     * @return null|Feed[]
     */
    public function getFeeds(): ?array
    {
        return $this->feeds;
    }
}
