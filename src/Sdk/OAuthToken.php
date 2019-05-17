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

    public function getToken(): string
    {
        return $this->token;
    }

    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }
}
