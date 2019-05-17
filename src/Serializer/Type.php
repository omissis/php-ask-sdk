<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer;

abstract class Type
{
    abstract public function __toString(): string;

    public static function skillManifestSchema(): Type\SkillManifestSchema
    {
        return new Type\SkillManifestSchema();
    }
}
