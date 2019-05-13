<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Ssl;

use Omissis\AlexaSdk\Model\Ssl\InvalidSslCertificateTypeException;
use Omissis\AlexaSdk\Model\Ssl\SslCertificateType;
use PHPUnit\Framework\TestCase;

final class SslCertificateTypeTest extends TestCase
{
    function test_it_is_not_initializable_using_a_wrong_certificate_type(): void
    {
        $this->expectException(InvalidSslCertificateTypeException::class);

        new SslCertificateType('foobar');
    }

    /**
     * @dataProvider certificateTypeProvider
     */
    function test_it_is_convertible_to_string(string $certificateType): void
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
