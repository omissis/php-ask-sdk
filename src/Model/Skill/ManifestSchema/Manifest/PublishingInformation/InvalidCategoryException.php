<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\PublishingInformation;

use Omissis\AlexaSdk\Model\Exception;

final class InvalidCategoryException extends Exception
{
    /**
     * @var string
     */
    private $invalidCategory;

    public function __construct(string $invalidCategory)
    {
        $this->invalidCategory = $invalidCategory;

        parent::__construct(sprintf(
            'Invalid category: "%s". Allowed values are: "%s".',
            $invalidCategory,
            implode('", "', Category::ALLOWED_CATEGORIES)
        ));
    }

    public function getInvalidDistributionMode(): string
    {
        return $this->invalidCategory;
    }
}
