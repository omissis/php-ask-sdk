<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\FlashBriefing\Locale\Feed;

use Omissis\AlexaSdk\Model\Exception;

final class InvalidUpdateFrequencyException extends Exception
{
    /**
     * @var string
     */
    private $invalidUpdateFrequency;

    public function __construct(string $invalidUpdateFrequency)
    {
        $this->invalidUpdateFrequency = $invalidUpdateFrequency;

        parent::__construct(sprintf(
            'Invalid update frequency: "%s". Allowed values are: "%s".',
            $invalidUpdateFrequency,
            implode('", "', UpdateFrequency::ALLOWED_UPDATED_FREQUENCIES)
        ));
    }

    public function getInvalidUpdateFrequency(): string
    {
        return $this->invalidUpdateFrequency;
    }
}
