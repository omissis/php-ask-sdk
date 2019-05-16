<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest;

use Omissis\AlexaSdk\Model\Skill\Manifest\PrivacyAndCompliance;
use Omissis\AlexaSdk\Model\Skill\Manifest\PrivacyAndCompliance\Locale;
use Omissis\AlexaSdk\Model\Uri\Url;
use PHPUnit\Framework\TestCase;

final class PrivacyAndComplianceTest extends TestCase
{
    public function test_it_exposes_accessors(): void
    {
        $locale = new Locale(
            new Url('https://example.com/privacy-policy'),
            new Url('https://example.com/terms-of-use')
        );
        $privacyAndCompliance = new PrivacyAndCompliance(true, false, true, false, true, ['en-US' => $locale]);

        $this->assertTrue($privacyAndCompliance->isAllowsPurchases());
        $this->assertFalse($privacyAndCompliance->isUsesPersonalInfo());
        $this->assertTrue($privacyAndCompliance->isChildDirected());
        $this->assertFalse($privacyAndCompliance->isExportCompliant());
        $this->assertTrue($privacyAndCompliance->isContainsAds());
        $this->assertSame(['en-US' => $locale], $privacyAndCompliance->getLocales());
    }
}
