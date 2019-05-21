<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer\Type;

use Omissis\AlexaSdk\Model\SkillInteractionModelSchema as SkillInteractionModelSchemaModel;
use Omissis\AlexaSdk\Serializer\Type;

final class SkillInteractionModelSchema extends Type
{
    public function __toString(): string
    {
        return SkillInteractionModelSchemaModel::class;
    }
}
