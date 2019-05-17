<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer;

interface Serializer
{
    /**
     * @param mixed $data
     */
    public function serialize($data, Format $format): string;
}
