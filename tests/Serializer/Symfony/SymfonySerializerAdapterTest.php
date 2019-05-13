<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Serializer\Symfony;

use Generator;
use Omissis\AlexaSdk\Model\Skill\Manifest;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\AlexaForBusiness;
use Omissis\AlexaSdk\Model\SkillManifestSchema;
use Omissis\AlexaSdk\Model\Uri\Uri;
use Omissis\AlexaSdk\Model\Uri\Url;
use Omissis\AlexaSdk\Serializer\Format;
use Omissis\AlexaSdk\Serializer\Symfony\SymfonySerializerAdapter;
use Omissis\AlexaSdk\Tests\Resources;
use PHPUnit\Framework\TestCase;

final class SymfonySerializerAdapterTest extends TestCase
{
    /**
     * @dataProvider serializationProvider
     */
    public function test_it_serializes(string $expectedString, $data, Format $format)
    {
        $serializer = new SymfonySerializerAdapter();

        $this->assertJsonStringEqualsJsonString($expectedString, $serializer->serialize($data, $format));
    }

    public function serializationProvider(): Generator
    {
        $serialized = Resources::getContent('meetings_skill_manifest.json');

        $schema = new SkillManifestSchema(
            new Manifest(
                ['alexaForBusiness' => new AlexaForBusiness(
                    new AlexaForBusiness\Endpoint(new Uri('arn:aws:lambda:us-east-1:123456789:function:myFunctionName1')),
                    ['NA' => new AlexaForBusiness\Region(
                        new AlexaForBusiness\Region\Endpoint(new Uri('arn:aws:lambda:us-east-1:123456789:function:myFunctionName1'))
                    )],
                    [new AlexaForBusiness\SupportedInterface(
                        new AlexaForBusiness\SupportedInterface\InterfaceNamespace('Alexa.Business.Reservation.Room'),
                        new AlexaForBusiness\SupportedInterface\Version('1.0'),
                        [
                            new AlexaForBusiness\SupportedInterface\Request('Search'),
                            new AlexaForBusiness\SupportedInterface\Request('Create'),
                            new AlexaForBusiness\SupportedInterface\Request('Update'),
                        ]
                    )]
                )],
                null,
                new Manifest\ManifestVersion('1.0'),
                null,
                new Manifest\PrivacyAndCompliance(false, false, false, true, false, [
                    'en-US' => new Manifest\PrivacyAndCompliance\Locale(
                        new Url('http://www.myprivacypolicy.sampleskill.com'),
                        new Url('http://www.termsofuse.sampleskill.com')
                    )
                ]),
                new Manifest\PublishingInformation(
                    ['en-US' => new Manifest\PublishingInformation\Locale(
                        'Room Booking Skill',
                        'This is a sample Alexa skill.',
                        'This skill has Alexa for Business reservations features.',
                        'https://smallUri.example.com/small1.png',
                        'https://largeUri.example.com/large1.png',
                        [
                            'Alexa, book this room.',
                            'Alexa, find a room at 3pm tomorrow.',
                        ],
                        [
                            'Meetings',
                            'Booking',
                            'Alexa For Business'
                        ],
                        'This skill has updates that fix feature bugs.'
                    )],
                    ['US'],
                    false,
                    null,
                    "1) Say 'Alexa, Book this room'",
                    new Manifest\PublishingInformation\Category('CALENDARS_AND_REMINDERS')
                )
            )
        );

        yield [$serialized, $schema, Format::json()];
    }
}
