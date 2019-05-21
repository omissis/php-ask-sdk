<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Tests\Model\Skill\ManifestSchema\Manifest;

use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\InvalidPermissionException;
use Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\Permission;
use PHPUnit\Framework\TestCase;

final class PermissionTest extends TestCase
{
    public function testItIsNotInitializableWithWrongName(): void
    {
        $this->expectException(InvalidPermissionException::class);

        new Permission('foo::bar::baz::quux');
    }

    /**
     * @dataProvider permissionProvider
     */
    public function testItExposesAccessors(string $permissionName): void
    {
        $permission = new Permission($permissionName);

        $this->assertSame($permissionName, $permission->getName());
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
