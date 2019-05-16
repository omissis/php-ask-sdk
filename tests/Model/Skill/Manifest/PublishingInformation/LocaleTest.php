<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest\PublishingInformation;

use Omissis\AlexaSdk\Model\Skill\Manifest\PublishingInformation\Locale;
use PHPUnit\Framework\TestCase;

final class LocaleTest extends TestCase
{
    public function test_it_exposes_accessors(): void
    {
        $name = 'Room Booking Skill';
        $summary = 'This is a sample Alexa skill.';
        $description = 'This skill has Alexa for Business reservations features.';
        $smallIconUri = 'https://smallUri.example.com/small1.png';
        $largeIconUri = 'https://largeUri.example.com/large1.png';
        $examplePhrases = [
            'Alexa, book this room.',
            'Alexa, find a room at 3pm tomorrow.'
        ];
        $keywords = [
            'Meetings',
            'Booking',
            'Alexa For Business'
        ];
        $updatesDescription = 'This skill has updates that fix feature bugs.';

        $locale = new Locale(
            $name,
            $summary,
            $description,
            $smallIconUri,
            $largeIconUri,
            $examplePhrases,
            $keywords,
            $updatesDescription
        );

        $this->assertSame($name, $locale->getName());
        $this->assertSame($summary, $locale->getSummary());
        $this->assertSame($description, $locale->getDescription());
        $this->assertSame($smallIconUri, $locale->getSmallIconUri());
        $this->assertSame($largeIconUri, $locale->getLargeIconUri());
        $this->assertSame($examplePhrases, $locale->getExamplePhrases());
        $this->assertSame($keywords, $locale->getKeywords());
        $this->assertSame($updatesDescription, $locale->getUpdatesDescription());
    }
}
