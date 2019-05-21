<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\Api\AlexaForBusiness\SupportedInterface;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\AlexaForBusiness\SupportedInterface\InterfaceNamespace;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\AlexaForBusiness\SupportedInterface\InvalidNamespaceException;
use PHPUnit\Framework\TestCase;

final class InterfaceNamespaceTest extends TestCase
{
    public function testItIsNotInitializableWithWrongNamesace(): void
    {
        $this->expectException(InvalidNamespaceException::class);
        $this->expectExceptionMessage('Invalid namespace: "Foo.Bar.Baz.Quux". Allowed values are: "Alexa.Business.Reservation.Room".');

        new InterfaceNamespace('Foo.Bar.Baz.Quux');
    }

    public function testItIsConvertibleToString(): void
    {
        $namespace = new InterfaceNamespace('Alexa.Business.Reservation.Room');

        $this->assertSame('Alexa.Business.Reservation.Room', (string) $namespace);
    }
}
