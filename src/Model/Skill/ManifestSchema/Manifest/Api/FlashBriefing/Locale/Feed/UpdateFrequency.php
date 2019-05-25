<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed;

/*final */class UpdateFrequency
{
    public const ALLOWED_UPDATED_FREQUENCIES = [
        'DAILY', // Feed content is updated daily.
        'HOURLY', // Feed content is updated hourly.
        'WEEKLY', // Feed content is updated weekly.
    ];

    /**
     * @var string
     */
    private $updateFrequency;

    /**
     * @throws InvalidUpdateFrequencyException
     */
    public function __construct(string $updateFrequency)
    {
        if (!in_array($updateFrequency, self::ALLOWED_UPDATED_FREQUENCIES, true)) {
            throw new InvalidUpdateFrequencyException($updateFrequency);
        }

        $this->updateFrequency = $updateFrequency;
    }

    public function __toString(): string
    {
        return $this->updateFrequency;
    }
}
