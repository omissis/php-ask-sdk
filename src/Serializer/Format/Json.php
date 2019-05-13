<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer\Format;

use Omissis\AlexaSdk\Serializer\Format;

final class Json extends Format
{
    public function __toString(): string
    {
        return 'json';
    }
}
