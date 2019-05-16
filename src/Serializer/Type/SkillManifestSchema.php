<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer\Type;

use Omissis\AlexaSdk\Model\SkillManifestSchema as SkillManifestSchemaModel;
use Omissis\AlexaSdk\Serializer\Type;

final class SkillManifestSchema extends Type
{
    public function __toString(): string
    {
        return SkillManifestSchemaModel::class;
    }
}
