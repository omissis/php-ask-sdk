<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Serializer;

abstract class Format
{
    abstract public function __toString(): string;

    public static function json(): Format\Json
    {
        return new Format\Json();
    }
}
