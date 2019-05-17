<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest\Api\Custom;

final class SupportedInterface
{
    public const ALLOWED_TYPES = [
        'ALEXA_PRESENTATION_APL',
        'AUDIO_PLAYER',
        'CAN_FULFILL_INTENT_REQUEST',
        'GADGET_CONTROLLER',
        'GAME_ENGINE',
        'RENDER_TEMPLATE',
        'VIDEO_APP',
    ];

    /**
     * @var string
     */
    private $type;

    /**
     * @throws InvalidNamespaceTypeException
     */
    public function __construct(string $type)
    {
        if (!in_array($type, self::ALLOWED_TYPES, true)) {
            throw new InvalidNamespaceTypeException($type);
        }

        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
