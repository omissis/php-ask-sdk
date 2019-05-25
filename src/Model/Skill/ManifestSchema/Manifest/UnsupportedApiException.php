<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest;

use Omissis\AlexaSdk\Model\Exception;

/*final */class UnsupportedApiException extends Exception
{
    /**
     * @var string
     */
    private $unsupportedApi;

    public function __construct(string $unsupportedApi)
    {
        parent::__construct(sprintf(
            'Api "%s" is not supported. Allowed values are: "%s"',
            $unsupportedApi,
            implode('", "', Api::ALLOWED_API_NAMES)
        ));

        $this->unsupportedApi = $unsupportedApi;
    }

    public function getUnsupportedApi(): string
    {
        return $this->unsupportedApi;
    }
}
