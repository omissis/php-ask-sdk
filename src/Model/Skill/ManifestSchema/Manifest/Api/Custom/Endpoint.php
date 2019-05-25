<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\Custom;

use Omissis\AlexaSdk\Model\Ssl\SslCertificateType;
use Omissis\AlexaSdk\Model\Uri\Uri;

/*final */class Endpoint
{
    /**
     * The Amazon Resource Name (ARN) of the Lambda function, or the HTTPS URL for a custom endpoint.
     *
     * @var Uri
     */
    private $uri;

    /**
     * The SSL certificate type for the skill's HTTPS endpoint. Only valid for HTTPS endpoints, not for AWS Lambda ARN
     *
     * @var null|SslCertificateType
     */
    private $sslCertificateType;

    public function __construct(Uri $uri, ?SslCertificateType $sslCertificateType = null)
    {
        $this->uri = $uri;
        $this->sslCertificateType = $sslCertificateType;
    }

    public function getUri(): Uri
    {
        return $this->uri;
    }

    public function getSslCertificateType(): ?SslCertificateType
    {
        return $this->sslCertificateType;
    }
}
