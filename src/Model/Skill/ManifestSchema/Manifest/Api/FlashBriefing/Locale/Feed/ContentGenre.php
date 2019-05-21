<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed;

final class ContentGenre
{
    public const ALLOWED_CONTENT_GENRES = [
        'HEADLINE_NEWS',
        'BUSINESS',
        'POLITICS',
        'ENTERTAINMENT',
        'TECHNOLOGY',
        'HUMOR',
        'LIFESTYLE',
        'SPORTS',
        'SCIENCE',
        'HEALTH_AND_FITNESS',
        'ARTS_AND_CULTURE',
        'PRODUCTIVITY_AND_UTILITIES',
        'OTHER',
    ];

    /**
     * @var string
     */
    private $contentGenre;

    /**
     * @throws InvalidContentGenreException
     */
    public function __construct(string $contentGenre)
    {
        if (!in_array($contentGenre, self::ALLOWED_CONTENT_GENRES, true)) {
            throw new InvalidContentGenreException($contentGenre);
        }

        $this->contentGenre = $contentGenre;
    }

    public function __toString(): string
    {
        return $this->contentGenre;
    }
}
