<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\Video\Locale;

final class CatalogInformation
{
    /**
     * @var string
     */
    private $sourceId;

    /**
     * @var null|string
     */
    private $type;

    public function __construct(string $sourceId, ?string $type = null)
    {
        $this->sourceId = $sourceId;
        $this->type = $type;
    }

    public function getSourceId(): string
    {
        return $this->sourceId;
    }

    public function getType(): ?string
    {
        return $this->type;
    }
}
