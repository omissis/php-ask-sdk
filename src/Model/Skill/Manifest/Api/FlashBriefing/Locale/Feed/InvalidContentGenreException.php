<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\FlashBriefing\Locale\Feed;

use Omissis\AlexaSdk\Model\Exception;

final class InvalidContentGenreException extends Exception
{
    /**
     * @var string
     */
    private $invalidContentGenre;

    public function __construct(string $invalidContentGenre)
    {
        $this->invalidContentGenre = $invalidContentGenre;

        parent::__construct(sprintf(
            'Invalid content genre: "%s". Allowed values are: "%s".',
            $invalidContentGenre,
            implode('", "', ContentGenre::ALLOWED_CONTENT_GENRES)
        ));
    }

    public function getInvalidContentGenre(): string
    {
        return $this->invalidContentGenre;
    }
}
