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
     * @var array<Feed>
     */
    private $feeds;

    /**
     * @param array<Feed>
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
     * @return array<Feed>
     */
    public function getFeeds(): array
    {
        return $this->feeds;
    }
}
