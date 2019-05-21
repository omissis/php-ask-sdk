<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest\PublishingInformation;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\PublishingInformation\Category;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\PublishingInformation\InvalidCategoryException;
use PHPUnit\Framework\TestCase;

final class CategoryTest extends TestCase
{
    const TEST_WRONG_VALUE = 'FOOBAR_1234567890';

    public function test_is_not_initializable_using_wrong_value(): void
    {
        $this->expectException(InvalidCategoryException::class);

        new Category(self::TEST_WRONG_VALUE);
    }

    /**
     * @dataProvider categoryProvider
     */
    public function test_it_is_convertible_to_string(string $category): void
    {
        $this->assertSame($category, (string) new Category($category));
    }

    public function categoryProvider(): \Generator
    {
        yield ['ALARMS_AND_CLOCKS'];
        yield ['ASTROLOGY'];
        yield ['BUSINESS_AND_FINANCE'];
        yield ['CALCULATORS'];
        yield ['CALENDARS_AND_REMINDERS'];
        yield ['CHILDRENS_EDUCATION_AND_REFERENCE'];
        yield ['CHILDRENS_GAMES'];
        yield ['CHILDRENS_MUSIC_AND_AUDIO'];
        yield ['CHILDRENS_NOVELTY_AND_HUMOR'];
        yield ['COMMUNICATION'];
        yield ['CONNECTED_CAR'];
        yield ['COOKING_AND_RECIPE'];
        yield ['CURRENCY_GUIDES_AND_CONVERTERS'];
        yield ['DATING'];
        yield ['DELIVERY_AND_TAKEOUT'];
        yield ['DEVICE_TRACKING'];
        yield ['EDUCATION_AND_REFERENCE'];
        yield ['EVENT_FINDERS'];
        yield ['EXERCISE_AND_WORKOUT'];
        yield ['FASHION_AND_STYLE'];
        yield ['FLIGHT_FINDERS'];
        yield ['FRIENDS_AND_FAMILY'];
        yield ['GAME_INFO_AND_ACCESSORY'];
        yield ['GAMES'];
        yield ['HEALTH_AND_FITNESS'];
        yield ['HOTEL_FINDERS'];
        yield ['KNOWLEDGE_AND_TRIVIA'];
        yield ['MOVIE_AND_TV_KNOWLEDGE_AND_TRIVIA'];
        yield ['MOVIE_INFO_AND_REVIEWS'];
        yield ['MOVIE_SHOWTIMES'];
        yield ['MUSIC_AND_AUDIO_ACCESSORIES'];
        yield ['MUSIC_AND_AUDIO_KNOWLEDGE_AND_TRIVIA'];
        yield ['MUSIC_INFO_REVIEWS_AND_RECOGNITION_SERVICE'];
        yield ['NAVIGATION_AND_TRIP_PLANNER'];
        yield ['NEWS'];
        yield ['NOVELTY'];
        yield ['ORGANIZERS_AND_ASSISTANTS'];
        yield ['PETS_AND_ANIMAL'];
        yield ['PODCAST'];
        yield ['PUBLIC_TRANSPORTATION'];
        yield ['RELIGION_AND_SPIRITUALITY'];
        yield ['RESTAURANT_BOOKING_INFO_AND_REVIEW'];
        yield ['SCHOOLS'];
        yield ['SCORE_KEEPING'];
        yield ['SELF_IMPROVEMENT'];
        yield ['SHOPPING'];
        yield ['SMART_HOME'];
        yield ['SOCIAL_NETWORKING'];
        yield ['SPORTS_GAMES'];
        yield ['SPORTS_NEWS'];
        yield ['STREAMING_SERVICE'];
        yield ['TAXI_AND_RIDESHARING'];
        yield ['TO_DO_LISTS_AND_NOTES'];
        yield ['TRANSLATORS'];
        yield ['TV_GUIDES'];
        yield ['UNIT_CONVERTERS'];
        yield ['WEATHER'];
        yield ['WINE_AND_BEVERAGE'];
        yield ['ZIP_CODE_LOOKUP'];
    }
}
