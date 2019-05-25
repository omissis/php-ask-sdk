<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Serializer\Symfony;

use Generator;
use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema;
use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Api\Video\Locale\VideoProviderTargetingName;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Events;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\PublishingInformation\DistributionCountry;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\VendorId;
use Omissis\AlexaSdk\Model\Ssl\SslCertificateType;
use Omissis\AlexaSdk\Model\Uri\Uri;
use Omissis\AlexaSdk\Model\Uri\Url;
use Omissis\AlexaSdk\Serializer\Format;
use Omissis\AlexaSdk\Tests\Resources;

// phpcs:disable ObjectCalisthenics.Files.ClassTraitAndInterfaceLength
final class SerializationProvider
{
    // phpcs:disable ObjectCalisthenics.Files.FunctionLength
    public static function provide(): Generator
    {
        // Testsuite: Skill Manifest Schema
        {
            // Testcase: Baby activity
            {
                $serialized = Resources::getContent('skill_manifest__baby_activity.json');

                $schema = new ManifestSchema(
                    null,
                    new Manifest(
                        ['health' => new Api\Health(
                            new Api\Health\Endpoint(new Uri('lambda-endpoint')),
                            ['NA' => new Api\Health\Region(new Api\Health\Region\Endpoint(new Uri('lambda-endpoint')))]
                        )],
                        null,
                        new Manifest\ManifestVersion('1.0'),
                        [new Manifest\Permission('alexa::health:profile:write')],
                        new Manifest\PrivacyAndCompliance(false, true, false, true, false, [
                            'en-US' => new Manifest\PrivacyAndCompliance\Locale(
                                new Url('https://example.com/privacy')
                            )
                        ]),
                        new Manifest\PublishingInformation(
                            ['en-US' => new Manifest\PublishingInformation\Locale(
                                'Baby Activity Test Skill',
                                'Baby Activity Skill 1',
                                'A skill that logs and tracks baby activities',
                                'iconUri',
                                'iconUri',
                                [
                                    '"Alexa, log a diaper change for Jane"',
                                    '"Alexa, what is Jane\'s weight"',
                                ],
                                [
                                    'Family',
                                    'Infant Tracking',
                                ]
                            )],
                            [],
                            true,
                            null,
                            "Alexa, log a diaper change",
                            new Manifest\PublishingInformation\Category('HEALTH_AND_FITNESS')
                        )
                    ),
                    new VendorId('your-vendor-id')
                );

                yield [$serialized, $schema, Format::json()];
            }

            // Testcase: Custom
            {
                $serialized = Resources::getContent('skill_manifest__custom.json');

                $schema = new ManifestSchema(
                    new Manifest(
                        ['custom' => new Api\Custom(
                            new Api\Custom\Endpoint(new Uri('arn:aws:lambda:us-east-1:040623927470:function:sampleSkill')),
                            ['NA' => new Api\Custom\Region(
                                new Api\Custom\Endpoint(
                                    new Uri('https://customapi.sampleskill.com'),
                                    new SslCertificateType('Trusted')
                                )
                            )],
                            [
                                new Api\Custom\SupportedInterface('ALEXA_PRESENTATION_APL'),
                                new Api\Custom\SupportedInterface('AUDIO_PLAYER'),
                                new Api\Custom\SupportedInterface('CAN_FULFILL_INTENT_REQUEST'),
                                new Api\Custom\SupportedInterface('GADGET_CONTROLLER'),
                                new Api\Custom\SupportedInterface('GAME_ENGINE'),
                                new Api\Custom\SupportedInterface('RENDER_TEMPLATE'),
                                new Api\Custom\SupportedInterface('VIDEO_APP'),
                            ]
                        )],
                        new Events(
                            new Events\Endpoint(new Uri('arn:aws:lambda:us-east-1:040623927470:function:sampleSkill')),
                            null,
                            [
                                new Events\Subscription(new Events\EventName('SKILL_ENABLED')),
                                new Events\Subscription(new Events\EventName('SKILL_DISABLED')),
                                new Events\Subscription(new Events\EventName('SKILL_PERMISSION_ACCEPTED')),
                                new Events\Subscription(new Events\EventName('SKILL_PERMISSION_CHANGED')),
                                new Events\Subscription(new Events\EventName('SKILL_ACCOUNT_LINKED')),
                            ],
                            ['NA' => new Events\Region(new Events\Endpoint(new Uri('arn:aws:lambda:us-east-1:040623927470:function:sampleSkill')))]
                        ),
                        new Manifest\ManifestVersion('1.0'),
                        [
                            new Manifest\Permission('alexa::devices:all:address:full:read'),
                            new Manifest\Permission('alexa:devices:all:address:country_and_postal_code:read'),
                            new Manifest\Permission('alexa::household:lists:read'),
                            new Manifest\Permission('alexa::household:lists:write'),
                            new Manifest\Permission('alexa::alerts:reminders:skill:readwrite'),
                        ],
                        new Manifest\PrivacyAndCompliance(false, false, false, true, false, [
                            'en-US' => new Manifest\PrivacyAndCompliance\Locale(
                                new Url('http://www.myprivacypolicy.sampleskill.com'),
                                new Url('http://www.termsofuse.sampleskill.com')
                            )
                        ]),
                        new Manifest\PublishingInformation(
                            ['en-US' => new Manifest\PublishingInformation\Locale(
                                'Sample custom skill name.',
                                'This is a sample Alexa custom skill.',
                                'This skill does interesting things.',
                                'https://smallUri.com',
                                'https://largeUri.com',
                                [
                                    'Alexa, open sample custom skill.',
                                    'Alexa, play sample custom skill.',
                                ],
                                [
                                    'Descriptive_Phrase_1',
                                    'Descriptive_Phrase_2',
                                    'Descriptive_Phrase_3',
                                ]
                            )],
                            [new DistributionCountry('US'), new DistributionCountry('GB'), new DistributionCountry('DE')],
                            false,
                            null,
                            "1) Say 'Alexa, hello world'",
                            new Manifest\PublishingInformation\Category('HEALTH_AND_FITNESS')
                        )
                    )
                );


                yield [$serialized, $schema, Format::json()];
            }

            // Testcase: Flash briefing
            {
                $serialized = Resources::getContent('skill_manifest__flash_briefing.json');

                $schema = new ManifestSchema(
                    new Manifest(
                        ['flashBriefing' => new Api\FlashBriefing([
                            'en-US' => new Api\FlashBriefing\Locale('Error message', [
                                new Api\FlashBriefing\Locale\Feed(
                                    'feed name',
                                    true,
                                    'In this skill',
                                    new Api\FlashBriefing\Locale\Feed\UpdateFrequency('HOURLY'),
                                    new Api\FlashBriefing\Locale\Feed\ContentGenre('POLITICS'),
                                    new Uri('https://fburi.com'),
                                    new Api\FlashBriefing\Locale\Feed\ContentType('TEXT'),
                                    new Url('https://feeds.sampleskill.com/feedX')
                                )
                            ])
                        ])],
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
                                'Sample skill name.',
                                'This is a sample Alexa skill.',
                                'This skill has basic and advanced features.',
                                'https://smallUri.com',
                                'https://largeUri.com',
                                [],
                                [
                                    'Flash Briefing',
                                    'News',
                                    'Happenings',
                                ]
                            )],
                            [new DistributionCountry('US'), new DistributionCountry('GB'), new DistributionCountry('DE')],
                            false,
                            null,
                            "1) Say 'Alexa, hello world'",
                            new Manifest\PublishingInformation\Category('HEALTH_AND_FITNESS')
                        )
                    )
                );

                yield [$serialized, $schema, Format::json()];
            }

            // Testcase: List with no custom component
            {
                $serialized = Resources::getContent('skill_manifest__list_with_no_custom_component.json');

                $schema = new ManifestSchema(
                    new Manifest(
                        ['householdList' => new Api\HouseholdList()],
                        new Events(
                            new Events\Endpoint(new Uri('arn:aws:lambda:us-east-1:040623927470:function:sampleSkill')),
                            null,
                            [
                                new Events\Subscription(new Events\EventName('SKILL_ENABLED')),
                                new Events\Subscription(new Events\EventName('SKILL_DISABLED')),
                                new Events\Subscription(new Events\EventName('SKILL_PERMISSION_ACCEPTED')),
                                new Events\Subscription(new Events\EventName('SKILL_PERMISSION_CHANGED')),
                                new Events\Subscription(new Events\EventName('SKILL_ACCOUNT_LINKED')),
                                new Events\Subscription(new Events\EventName('ITEMS_CREATED')),
                                new Events\Subscription(new Events\EventName('ITEMS_UPDATED')),
                                new Events\Subscription(new Events\EventName('ITEMS_DELETED')),
                            ],
                            ['NA' => new Events\Region(new Events\Endpoint(new Uri('arn:aws:lambda:us-east-1:040623927470:function:sampleSkill')))]
                        ),
                        new Manifest\ManifestVersion('1.0'),
                        [
                            new Manifest\Permission('alexa::devices:all:address:full:read'),
                            new Manifest\Permission('alexa:devices:all:address:country_and_postal_code:read'),
                            new Manifest\Permission('alexa::household:lists:read'),
                            new Manifest\Permission('alexa::household:lists:write'),
                        ],
                        new Manifest\PrivacyAndCompliance(false, false, false, true, false, [
                            'en-US' => new Manifest\PrivacyAndCompliance\Locale(
                                new Url('http://www.myprivacypolicy.sampleskill.com'),
                                new Url('http://www.termsofuse.sampleskill.com')
                            )
                        ]),
                        new Manifest\PublishingInformation(
                            ['en-US' => new Manifest\PublishingInformation\Locale(
                                'Sample skill name.',
                                'This is a sample Alexa skill.',
                                'This skill does interesting things.',
                                'https://smallUri.com',
                                'https://largeUri.com',
                                [
                                    'Alexa, open sample skill.',
                                    'Alexa, play sample skill.',
                                ],
                                [
                                    'Descriptive_Phrase_1',
                                    'Descriptive_Phrase_2',
                                    'Descriptive_Phrase_3',
                                ]
                            )],
                            [new DistributionCountry('US'), new DistributionCountry('GB'), new DistributionCountry('DE')],
                            false,
                            null,
                            "1) Say 'Alexa, hello world'",
                            new Manifest\PublishingInformation\Category('HEALTH_AND_FITNESS')
                        )
                    )
                );

                yield [$serialized, $schema, Format::json()];
            }

            // Testcase: Meetings
            {
                $serialized = Resources::getContent('skill_manifest__meetings.json');

                $schema = new ManifestSchema(
                    new Manifest(
                        ['alexaForBusiness' => new Api\AlexaForBusiness(
                            new Api\AlexaForBusiness\Endpoint(new Uri('arn:aws:lambda:us-east-1:123456789:function:myFunctionName1')),
                            ['NA' => new Api\AlexaForBusiness\Region(
                                new Api\AlexaForBusiness\Region\Endpoint(new Uri('arn:aws:lambda:us-east-1:123456789:function:myFunctionName1'))
                            )],
                            [new Api\AlexaForBusiness\SupportedInterface(
                                new Api\AlexaForBusiness\SupportedInterface\InterfaceNamespace('Alexa.Business.Reservation.Room'),
                                new Api\AlexaForBusiness\SupportedInterface\Version('1.0'),
                                [
                                    new Api\AlexaForBusiness\SupportedInterface\Request('Search'),
                                    new Api\AlexaForBusiness\SupportedInterface\Request('Create'),
                                    new Api\AlexaForBusiness\SupportedInterface\Request('Update'),
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

                yield [$serialized, $schema, Format::json()];
            }

            // Testcase: Smart home
            {
                $serialized = Resources::getContent('skill_manifest__smart_home.json');

                $schema = new ManifestSchema(
                    new Manifest(
                        ['smartHome' => new Api\SmartHome(
                            new Api\SmartHome\Endpoint(new Uri('arn:aws:lambda:us-east-1:040623927470:function:sampleSkill')),
                            ['NA' => new Api\SmartHome\Region(new Api\SmartHome\Endpoint(new Uri('arn:aws:lambda:us-west-2:010623927470:function:sampleSkillWest')))]
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
                                'Sample skill name.',
                                'This is a sample Alexa skill.',
                                'This skill has basic and advanced smart devices control features.',
                                'https://smallUri.com',
                                'https://largeUri.com',
                                [
                                    'Alexa, open sample skill.',
                                    'Alexa, blink kitchen lights.',
                                ],
                                [
                                    'Smart Home',
                                    'Lights',
                                    'Smart Devices',
                                ]
                            )],
                            [new DistributionCountry('US'), new DistributionCountry('GB'), new DistributionCountry('DE')],
                            false,
                            null,
                            "1) Say 'Alexa, turn on sample lights'",
                            new Manifest\PublishingInformation\Category('SMART_HOME')
                        )
                    )
                );

                yield [$serialized, $schema, Format::json()];
            }

            // Testcase: Video
            {
                $serialized = Resources::getContent('skill_manifest__video.json');

                $schema = new ManifestSchema(
                    new Manifest(
                        ['video' => new Api\Video(
                            ['en-US' => new Api\Video\Locale(
                                [new VideoProviderTargetingName('TV provider')],
                                [new Api\Video\Locale\CatalogInformation('1234', 'FIRE_TV')]
                            )],
                            new Api\Video\Endpoint(new Uri('arn:aws:lambda:us-east-1:452493640596:function:sampleSkill')),
                            ['NA' => new Api\Video\Region(
                                new Api\Video\Region\Endpoint(
                                    new Uri('arn:aws:lambda:us-east-1:452493640596:function:sampleSkill')
                                ),
                                [new Api\Video\Region\Upchannel(
                                    new Api\Video\Region\Upchannel\Type('SNS'),
                                    new Uri('arn:aws:sns:us-east-1:291420629295:sampleSkill')
                                )]
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
                                'VideoSampleSkill',
                                'This is a sample Alexa skill.',
                                'This skill has video control features.',
                                'https://smallUri.com',
                                'https://largeUri.com',
                                [
                                    'Alexa, tune to channel 206',
                                    'Alexa, search for comedy movies',
                                    'Alexa, pause.',
                                ],
                                [
                                    'Video',
                                    'TV',
                                ]
                            )],
                            [new DistributionCountry('US'), new DistributionCountry('GB'), new DistributionCountry('DE')],
                            false,
                            null,
                            '',
                            new Manifest\PublishingInformation\Category('SMART_HOME')
                        )
                    )
                );

                yield [$serialized, $schema, Format::json()];
            }
        }

        // Testsuite: Skill Interaction Model Schema
        {
            // Testcase: my drupal commerce
            {
                $serialized = Resources::getContent('skill_interaction_model__my_drupal_commerce.json');

                $schema = new InteractionModelSchema(
                    new InteractionModel(
                        new InteractionModelSchema\InteractionModel\LanguageModel(
                            new InteractionModel\LanguageModel\InvocationName('my drupal commerce'),
                            [
                                new InteractionModel\LanguageModel\Intent('AMAZON.FallbackIntent', null, ['hey drupalexa', 'drupalexa']),
                                new InteractionModel\LanguageModel\Intent('AMAZON.CancelIntent', null, []),
                                new InteractionModel\LanguageModel\Intent('AMAZON.HelpIntent', null, []),
                                new InteractionModel\LanguageModel\Intent('AMAZON.StopIntent', null, []),
                                new InteractionModel\LanguageModel\Intent('AMAZON.NavigateHomeIntent', null, []),
                                new InteractionModel\LanguageModel\Intent(
                                    'AddProductToCartIntent',
                                    [new InteractionModel\LanguageModel\Intent\Slot('product_name', 'ProductName')],
                                    [
                                        new InteractionModel\LanguageModel\Intent\Sample('cart {product_name}'),
                                        new InteractionModel\LanguageModel\Intent\Sample('basket {product_name}'),
                                        new InteractionModel\LanguageModel\Intent\Sample('add {product_name}'),
                                        new InteractionModel\LanguageModel\Intent\Sample('add {product_name} to the cart'),
                                        new InteractionModel\LanguageModel\Intent\Sample('add {product_name} to cart'),
                                    ]
                                ),
                            ],
                            [new InteractionModel\LanguageModel\Type('ProductName', [
                                new InteractionModel\LanguageModel\Type\Value(new InteractionModel\LanguageModel\Type\Value\Name('nothing'), new InteractionModel\LanguageModel\Type\Value\Id('0'))
                            ])]
                        ),
                        new InteractionModelSchema\InteractionModel\Dialog(
                            [new InteractionModelSchema\InteractionModel\Dialog\Intent(
                                'AddProductToCartIntent',
                                null,
                                [new InteractionModel\Dialog\Intent\Slot('product_name', 'ProductName', true, false, [
                                    'elicitation' => 'Elicit.Slot.989082703768.30792011828',
                                ])],
                                false,
                                []
                            )],
                            'ALWAYS'
                        ),
                        [new InteractionModelSchema\InteractionModel\Prompt(
                            'Elicit.Slot.989082703768.30792011828',
                            [new InteractionModelSchema\InteractionModel\Prompt\Variation('PlainText', 'what\'s the product name?')]
                        )]
                    ),
                    new InteractionModelSchema\Version('2')
                );

                yield [$serialized, $schema, Format::json()];
            }

            // Testcase: my space facts
            {
                $serialized = Resources::getContent('skill_interaction_model__my_space_facts.json');


                $schema = new InteractionModelSchema(
                    new InteractionModel(
                        new InteractionModelSchema\InteractionModel\LanguageModel(
                            new InteractionModel\LanguageModel\InvocationName('my space facts'),
                            [
                                new InteractionModel\LanguageModel\Intent('AMAZON.CancelIntent', null, []),
                                new InteractionModel\LanguageModel\Intent('AMAZON.HelpIntent', null, []),
                                new InteractionModel\LanguageModel\Intent('AMAZON.StopIntent', null, []),
                                new InteractionModel\LanguageModel\Intent('GetNewFactIntent', [], ['Give me a fact', 'tell me a fact']),
                                new InteractionModel\LanguageModel\Intent(
                                    'GetTravelTime',
                                    [
                                        new InteractionModel\LanguageModel\Intent\Slot('DepartingPlanet', 'Planet', [
                                            'I\'m starting from {DepartingPlanet} ',
                                            '{DepartingPlanet} ',
                                            'I\'m going from {DepartingPlanet} to {ArrivingPlanet} ',
                                        ]),
                                        new InteractionModel\LanguageModel\Intent\Slot('ArrivingPlanet', 'Planet', [
                                            'I\'m going to {ArrivingPlanet} ',
                                            '{ArrivingPlanet} ',
                                        ])
                                    ],
                                    [
                                        new InteractionModel\LanguageModel\Intent\Sample('calculate travel time'),
                                        new InteractionModel\LanguageModel\Intent\Sample('how long does it take to travel from {DepartingPlanet} to {ArrivingPlanet} '),
                                    ]
                                ),
                            ],
                            [new InteractionModel\LanguageModel\Type('Planet', [
                                new InteractionModel\LanguageModel\Type\Value(new InteractionModel\LanguageModel\Type\Value\Name('Mercury')),
                                new InteractionModel\LanguageModel\Type\Value(new InteractionModel\LanguageModel\Type\Value\Name('Venus')),
                                new InteractionModel\LanguageModel\Type\Value(new InteractionModel\LanguageModel\Type\Value\Name('Earth')),
                                new InteractionModel\LanguageModel\Type\Value(new InteractionModel\LanguageModel\Type\Value\Name('Mars')),
                                new InteractionModel\LanguageModel\Type\Value(new InteractionModel\LanguageModel\Type\Value\Name('Jupiter')),
                                new InteractionModel\LanguageModel\Type\Value(new InteractionModel\LanguageModel\Type\Value\Name('Saturn')),
                                new InteractionModel\LanguageModel\Type\Value(new InteractionModel\LanguageModel\Type\Value\Name('Uranus')),
                                new InteractionModel\LanguageModel\Type\Value(new InteractionModel\LanguageModel\Type\Value\Name('Neptune')),
                                new InteractionModel\LanguageModel\Type\Value(new InteractionModel\LanguageModel\Type\Value\Name('Pluto')),
                            ])]
                        ),
                        new InteractionModelSchema\InteractionModel\Dialog(
                            [new InteractionModelSchema\InteractionModel\Dialog\Intent(
                                'GetTravelTime',
                                null,
                                [
                                    new InteractionModel\Dialog\Intent\Slot('DepartingPlanet', 'Planet', true, false, ['elicitation' => 'Elicit.Intent-GetTravelTime.IntentSlot-DepartingPlanet'], [
                                        new InteractionModel\Dialog\Intent\Slot\Validation('isNotInSet', 'Slot.Validation.596358663326.282490667310.1526107495625', ['the sun', 'sun', 'our sun']),
                                        new InteractionModel\Dialog\Intent\Slot\Validation('hasEntityResolutionMatch', 'Slot.Validation.596358663326.282490667310.1366622834897'),
                                    ]),
                                    new InteractionModel\Dialog\Intent\Slot('ArrivingPlanet', 'Planet', true, false, ['elicitation' => 'Elicit.Intent-GetTravelTime.IntentSlot-ArrivingPlanet'])
                                ],
                                false,
                                []
                            )],
                            'ALWAYS'
                        ),
                        [
                            new InteractionModelSchema\InteractionModel\Prompt(
                                'Elicit.Intent-GetTravelTime.IntentSlot-DepartingPlanet',
                                [new InteractionModelSchema\InteractionModel\Prompt\Variation('PlainText', 'Which planet do you want to start from?')]
                            ),
                            new InteractionModelSchema\InteractionModel\Prompt(
                                'Elicit.Intent-GetTravelTime.IntentSlot-ArrivingPlanet',
                                [new InteractionModelSchema\InteractionModel\Prompt\Variation('PlainText', 'Which planet do you want to travel to?')]
                            ),
                            new InteractionModelSchema\InteractionModel\Prompt(
                                'Slot.Validation.596358663326.282490667310.1526107495625',
                                [
                                    new InteractionModelSchema\InteractionModel\Prompt\Variation('PlainText', 'I can\'t answer this question about the sun, only planets. Please tell me a planet.'),
                                    new InteractionModelSchema\InteractionModel\Prompt\Variation('PlainText', 'While the sun is the center of our solar system, it is not a planet. Please tell me a planet.'),
                                ]
                            ),
                            new InteractionModelSchema\InteractionModel\Prompt(
                                'Slot.Validation.596358663326.282490667310.1366622834897',
                                [
                                    new InteractionModelSchema\InteractionModel\Prompt\Variation('PlainText', '{DepartingPlanet} is not a planet. Please tell me one of the nine planets in our solar system. '),
                                    new InteractionModelSchema\InteractionModel\Prompt\Variation('PlainText', 'I don\'t recognize {DepartingPlanet} as a planet in our solar system. Please tell me a planet.'),
                                ]
                            ),
                        ]
                    )
                );

                yield [$serialized, $schema, Format::json()];
            }
        }
    }
    // phpcs:enable ObjectCalisthenics.Files.FunctionLength
}
// phpcs:emable ObjectCalisthenics.Files.ClassTraitAndInterfaceLength
