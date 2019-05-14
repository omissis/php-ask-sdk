<?php

namespace Omissis\AlexaSdk\Model\Skill\Manifest\PrivacyAndCompliance;

use Omissis\AlexaSdk\Model\Uri\Url;

final class Locale
{
    /**
     * URL to the privacy policy for the skill for the locale.
     *
     * @var Url
     */
    private $privacyPolicyUrl;

    /**
     * URL to the terms of use for the skill for the locale.
     *
     * @var null|Url
     */
    private $termsOfUseUrl;

    public function __construct(Url $privacyPolicyUrl, ?Url $termsOfUseUrl = null)
    {
        $this->privacyPolicyUrl = $privacyPolicyUrl;
        $this->termsOfUseUrl = $termsOfUseUrl;
    }

    public function getPrivacyPolicyUrl(): Url
    {
        return $this->privacyPolicyUrl;
    }

    public function getTermsOfUseUrl(): ?Url
    {
        return $this->termsOfUseUrl;
    }
}
