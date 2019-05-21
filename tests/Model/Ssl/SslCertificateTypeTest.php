<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Ssl;

use Omissis\AlexaSdk\Model\Ssl\InvalidSslCertificateTypeException;
use Omissis\AlexaSdk\Model\Ssl\SslCertificateType;
use PHPUnit\Framework\TestCase;

final class SslCertificateTypeTest extends TestCase
{
    public function testItIsNotInitializableUsingAWrongCertificateType(): void
    {
        $this->expectException(InvalidSslCertificateTypeException::class);

        new SslCertificateType('foobar');
    }

    /**
     * @dataProvider certificateTypeProvider
     */
    public function testItIsConvertibleToString(string $certificateType): void
    {
        $this->assertSame($certificateType, (string) new SslCertificateType($certificateType));
    }

    public function certificateTypeProvider(): \Generator
    {
        yield ['SelfSigned'];
        yield ['Trusted'];
        yield ['Wildcard'];
    }
}
