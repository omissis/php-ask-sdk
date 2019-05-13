<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest;

use Omissis\AlexaSdk\Model\Skill\Manifest\PrivacyAndCompliance;
use Omissis\AlexaSdk\Model\Skill\Manifest\PrivacyAndCompliance\Locale;
use Omissis\AlexaSdk\Model\Uri\Url;
use PHPUnit\Framework\TestCase;

final class PrivacyAndComplianceTest extends TestCase
{
    function test_it_exposes_accessors(): void
    {
        $locale = new Locale(
            new Url('https://example.com/privacy-policy'),
            new Url('https://example.com/terms-of-use')
        );
        $privacyAndCompliance = new PrivacyAndCompliance(true, false, true, false, true, [$locale]);

        $this->assertSame(true, $privacyAndCompliance->isAllowsPurchases());
        $this->assertSame(false, $privacyAndCompliance->isUsesPersonalInfo());
        $this->assertSame(true, $privacyAndCompliance->isChildDirected());
        $this->assertSame(false, $privacyAndCompliance->isExportCompliant());
        $this->assertSame(true, $privacyAndCompliance->isContainsAds());
        $this->assertSame([$locale], $privacyAndCompliance->getLocales());
    }
}
