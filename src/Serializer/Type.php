<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer;

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema;
use Omissis\AlexaSdk\Sdk\Exception;

abstract class Type
{
    /**
     * @throws Exception
     */
    public static function fromObject(object $expectedObject): self
    {
        if ($expectedObject instanceof ManifestSchema) {
            return self::skillManifestSchema();
        }

        if ($expectedObject instanceof InteractionModelSchema) {
            return self::skillInteractionModelSchema();
        }

        throw new Exception(sprintf('Unsupported Type: %s', get_class($expectedObject)));
    }

    abstract public function __toString(): string;

    public static function skillManifestSchema(): Type\SkillManifestSchema
    {
        return new Type\SkillManifestSchema();
    }

    public static function skillInteractionModelSchema(): Type\SkillInteractionModelSchema
    {
        return new Type\SkillInteractionModelSchema();
    }
}
