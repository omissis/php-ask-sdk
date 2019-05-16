<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Serializer\Symfony;

use Generator;
use Omissis\AlexaSdk\Model\Skill\Manifest;
use Omissis\AlexaSdk\Model\Skill\Manifest\Api\AlexaForBusiness;
use Omissis\AlexaSdk\Model\Skill\Manifest\PublishingInformation\DistributionCountry;
use Omissis\AlexaSdk\Model\SkillManifestSchema;
use Omissis\AlexaSdk\Model\Uri\Uri;
use Omissis\AlexaSdk\Model\Uri\Url;
use Omissis\AlexaSdk\Serializer\Format;
use Omissis\AlexaSdk\Serializer\Symfony\SymfonyDeserializerAdapter;
use Omissis\AlexaSdk\Serializer\Type;
use Omissis\AlexaSdk\Tests\Resources;
use PHPUnit\Framework\TestCase;

final class SymfonyDeserializerAdapterTest extends TestCase
{
    /**
     * @dataProvider deserializationProvider
     *
     * @param mixed $expectedObject
     */
    public function test_it_deserializes($expectedObject, string $data, Format $format, Type $outputType)
    {
        $actualObject = (new SymfonyDeserializerAdapter())->deserialize($data, $format, $outputType);

        $this->assertEquals($expectedObject, $actualObject);
    }

    public function deserializationProvider(): Generator
    {
//        // Testcase: Baby activity
//        {
//            $schema = new SkillManifestSchema(
//                new Manifest()
//            );
//
//            $serialized = Resources::getContent('baby_activity_skill_manifest.json');
//
//            yield [$schema, $serialized, Format::json(), Type::skillManifestSchema()];
//        }
//
//        // Testcase: Custom
//        {
//            $schema = new SkillManifestSchema(
//                new Manifest()
//            );
//
//            $serialized = Resources::getContent('custom_skill_manifest.json');
//
//            yield [$schema, $serialized, Format::json(), Type::skillManifestSchema()];
//        }
//
//        // Testcase: Flash briefing
//        {
//            $schema = new SkillManifestSchema(
//                new Manifest()
//            );
//
//            $serialized = Resources::getContent('flash_briefing_skill_manifest.json');
//
//            yield [$schema, $serialized, Format::json(), Type::skillManifestSchema()];
//        }
//
//        // Testcase: List with no custom component
//        {
//            $schema = new SkillManifestSchema(
//                new Manifest()
//            );
//
//            $serialized = Resources::getContent('list_skill_manifest_with_no_custom_component.json');
//
//            yield [$schema, $serialized, Format::json(), Type::skillManifestSchema()];
//        }

        // Testcase: Meetings
        {
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
                        [new DistributionCountry('US')],
                        false,
                        null,
                        "1) Say 'Alexa, Book this room'",
                        new Manifest\PublishingInformation\Category('CALENDARS_AND_REMINDERS')
                    )
                )
            );

            $serialized = Resources::getContent('meetings_skill_manifest.json');

            yield [$schema, $serialized, Format::json(), Type::skillManifestSchema()];
        }
//
//        // Testcase: Smart home
//        {
//            $schema = new SkillManifestSchema(
//                new Manifest()
//            );
//
//            $serialized = Resources::getContent('smart_home_skill_manifest.json');
//
//            yield [$schema, $serialized, Format::json(), Type::skillManifestSchema()];
//        }
//
//        // Testcase: Video
//        {
//            $schema = new SkillManifestSchema(
//                new Manifest()
//            );
//
//            $serialized = Resources::getContent('video_skill_manifest.json');
//
//            yield [$schema, $serialized, Format::json(), Type::skillManifestSchema()];
//        }
    }
}
