<?php

declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Ssl;

use Omissis\AlexaSdk\Sdk\Exception;

final class InvalidSslCertificateTypeException extends Exception
{
    /**
     * @var string
     */
    private $invalidSslCertificateType;

    public function __construct(string $invalidSslCertificateType)
    {
        $this->invalidSslCertificateType = $invalidSslCertificateType;

        parent::__construct(sprintf(
            'Invalid SSL Certificate Type: "%s". Allowed values are: "%s".',
            $invalidSslCertificateType,
            implode('", "', SslCertificateType::ALLOWED_SSL_CERTIFICATE_TYPES)
        ));
    }

    public function getSslCertificateType(): string
    {
        return $this->invalidSslCertificateType;
    }
}
