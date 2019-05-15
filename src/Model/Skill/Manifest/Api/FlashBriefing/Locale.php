<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\FlashBriefing;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\FlashBriefing\Locale\Feed;

final class Locale
{
    /**
     * @var string
     */
    private $customErrorMessage;

    /**
     * @var Feed[]
     */
    private $feeds;

    /**
     * @param Feed[] $feeds
     */
    public function __construct(string $customErrorMessage, array $feeds)
    {
        $this->customErrorMessage = $customErrorMessage;
        $this->feeds = $feeds;
    }

    public function getCustomErrorMessage(): string
    {
        return $this->customErrorMessage;
    }

    /**
     * @return Feed[]
     */
    public function getFeeds(): array
    {
        return $this->feeds;
    }
}
