<?php

namespace Omissis\AlexaSdk\Model\Ssl;

final class SslCertificateType
{
    public const ALLOWED_SSL_CERTIFICATE_TYPES = ['SelfSigned', 'Trusted', 'Wildcard'];

    /**
     * @var string
     */
    private $sslCertificateType;

    /**
     * @throws InvalidSslCertificateTypeException
     */
    public function __construct(string $sslCertificateType)
    {
        if (!in_array($sslCertificateType, self::ALLOWED_SSL_CERTIFICATE_TYPES, true)) {
            throw new InvalidSslCertificateTypeException($sslCertificateType);
        }

        $this->sslCertificateType = $sslCertificateType;
    }

    public function __toString(): string
    {
        return $this->sslCertificateType;
    }
}
