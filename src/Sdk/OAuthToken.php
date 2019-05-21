<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Sdk;

final class OAuthToken
{
    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $refreshToken;

    public function __construct(string $token, string $refreshToken)
    {
        $this->token = $token;
        $this->refreshToken = $refreshToken;
    }

    public static function fromEnv(): self
    {
        return new self(getenv('PHP_ASK_SDK_OAUTH_TOKEN') ?: '', getenv('PHP_ASK_SDK_OAUTH_REFRESH_TOKEN') ?: '');
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }
}
