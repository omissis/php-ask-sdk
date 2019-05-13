<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\Manifest;

use Omissis\AlexaSdk\Model\Skill\Manifest\InvalidPermissionException;
use Omissis\AlexaSdk\Model\Skill\Manifest\Permission;
use PHPUnit\Framework\TestCase;

final class PermissionTest extends TestCase
{
    function test_it_is_not_initializable_with_wrong_name(): void
    {
        $this->expectException(InvalidPermissionException::class);

        new Permission('foo::bar::baz::quux');
    }

    /**
     * @dataProvider permissionProvider
     */
    function test_it_is_convertible_to_string(string $permission): void
    {
        $this->assertSame($permission, (string) new Permission($permission));
    }

    public function permissionProvider(): \Generator
    {
        yield ['alexa::alerts:reminders:skill:readwrite'];
        yield ['alexa:devices:all:address:country_and_postal_code:read'];
        yield ['alexa::devices:all:geolocation:read'];
        yield ['alexa::devices:all:address:full:read'];
        yield ['alexa::devices:all:notifications:write'];
        yield ['alexa::household:lists:read'];
        yield ['alexa::household:lists:write'];
        yield ['alexa::profile:email:read'];
        yield ['alexa::profile:given_name:read'];
        yield ['alexa::profile:mobile_number:read'];
        yield ['alexa::profile:name:read'];
    }
}
