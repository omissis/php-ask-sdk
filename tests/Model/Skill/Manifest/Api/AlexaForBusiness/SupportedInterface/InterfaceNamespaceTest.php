<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\Api\AlexaForBusiness\SupportedInterface;

use Omissis\AlexaSdk\Model\Skill\Manifest\Api\AlexaForBusiness\SupportedInterface\InterfaceNamespace;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\AlexaForBusiness\SupportedInterface\InvalidNamespaceException;
use PHPUnit\Framework\TestCase;

final class InterfaceNamespaceTest extends TestCase
{
    public function test_it_is_not_initializable_with_wrong_namesace(): void
    {
        $this->expectException(InvalidNamespaceException::class);
        $this->expectExceptionMessage('Invalid namespace: "Foo.Bar.Baz.Quux". Allowed values are: "Alexa.Business.Reservation.Room".');

        new InterfaceNamespace('Foo.Bar.Baz.Quux');
    }

    public function test_it_is_convertible_to_string(): void
    {
        $namespace = new InterfaceNamespace('Alexa.Business.Reservation.Room');

        $this->assertSame('Alexa.Business.Reservation.Room', (string) $namespace);
    }
}
