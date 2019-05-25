<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\Prompt;

use Omissis\AlexaSdk\Model\Exception;

/*final */class InvalidVariationTypeException extends Exception
{
    /**
     * @var string
     */
    private $invalidVariationType;

    public function __construct(string $invalidVariationType)
    {
        $this->invalidVariationType = $invalidVariationType;

        parent::__construct(sprintf(
            'Invalid variation type: %s. Allowed values are: "%s".',
            $invalidVariationType,
            implode('", "', Variation::ALLOWED_TYPES)
        ));
    }

    public function getInvalidVariationType(): string
    {
        return $this->invalidVariationType;
    }
}
