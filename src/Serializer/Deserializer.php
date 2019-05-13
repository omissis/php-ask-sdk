<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer;

interface Deserializer
{
    /**
     * @return mixed
     */
    public function deserialize(string $data, Format $inputFormat, Type $outputType);
}
