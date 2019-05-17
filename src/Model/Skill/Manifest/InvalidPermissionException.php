<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\Manifest;

use Omissis\AlexaSdk\Model\Exception;

final class InvalidPermissionException extends Exception
{
    /**
     * @var string
     */
    private $invalidPermission;

    public function __construct(string $invalidPermission)
    {
        $this->invalidPermission = $invalidPermission;

        parent::__construct(sprintf(
            'Invalid permission: "%s". Allowed values are: "%s".',
            $invalidPermission,
            implode('", "', Permission::ALLOWED_PERMISSIONS)
        ));
    }

    public function getInvalidPermission(): string
    {
        return $this->invalidPermission;
    }
}
