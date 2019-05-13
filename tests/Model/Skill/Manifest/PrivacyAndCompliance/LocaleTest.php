<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\PrivacyAndCompliance;

use Omissis\AlexaSdk\Model\Skill\Manifest\PrivacyAndCompliance\Locale;
use Omissis\AlexaSdk\Model\Uri\Url;
use PHPUnit\Framework\TestCase;

final class LocaleTest extends TestCase
{
    function test_it_exposes_accessors(): void
    {
        $privacyPolicyUrl = new Url('https://example.com/privacy-policy');
        $termsOfUseUrl = new Url('https://example.com/terms-of-use');

        $locale = new Locale($privacyPolicyUrl, $termsOfUseUrl);

        $this->assertSame($privacyPolicyUrl, $locale->getPrivacyPolicyUrl());
        $this->assertSame($termsOfUseUrl, $locale->getTermsOfUseUrl());
    }
}
