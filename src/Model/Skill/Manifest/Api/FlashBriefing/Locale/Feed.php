<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\FlashBriefing\Locale;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\FlashBriefing\Locale\Feed\ContentGenre;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\FlashBriefing\Locale\Feed\ContentType;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\FlashBriefing\Locale\Feed\UpdateFrequency;
use Omissis\AlexaSdk\Model\Uri\Uri;
use Omissis\AlexaSdk\Model\Uri\Url;

final class Feed
{
    /**
     * Name of the feed
     *
     * @var string
     */
    private $name;

    /**
     * If true, the feed is included in the flash briefing by default. If false, it is not.
     *
     * @var bool
     */
    private $isDefault;

    /**
     * Preamble to flash briefing
     *
     * @var string
     */
    private $vuiPreamble;

    /**
     * See UpdateFrequency enumeration
     *
     * @var UpdateFrequency
     */
    private $updateFrequency;

    /**
     * See ContentGenre enumeration
     *
     * @var ContentGenre
     */
    private $genre;

    /**
     * URI of the image used for the skill in the skill store.
     *
     * @var Uri
     */
    private $imageUri;

    /**
     * See ContentType enumeration
     *
     * @var ContentType
     */
    private $contentType;

    /**
     * URL of the content of the feed.
     *
     * @var Url
     */
    private $url;

    public function __construct(
        string  $name,
        bool $isDefault,
        string $vuiPreamble,
        UpdateFrequency $updateFrequency,
        ContentGenre $genre,
        Uri $imageUri,
        ContentType $contentType,
        Url $url
    ) {
        $this->name = $name;
        $this->isDefault = $isDefault;
        $this->vuiPreamble = $vuiPreamble;
        $this->updateFrequency = $updateFrequency;
        $this->genre = $genre;
        $this->imageUri = $imageUri;
        $this->contentType = $contentType;
        $this->url = $url;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isDefault(): bool
    {
        return $this->isDefault;
    }

    public function getVuiPreamble(): string
    {
        return $this->vuiPreamble;
    }

    public function getUpdateFrequency(): UpdateFrequency
    {
        return $this->updateFrequency;
    }

    public function getGenre(): ContentGenre
    {
        return $this->genre;
    }

    public function getImageUri(): Uri
    {
        return $this->imageUri;
    }

    public function getContentType(): ContentType
    {
        return $this->contentType;
    }

    public function getUrl(): Url
    {
        return $this->url;
    }
}
