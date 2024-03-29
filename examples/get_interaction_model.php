<?php declare(strict_types=1);

require_once __DIR__.'/bootstrap.php';

try {
    $interactionModel = $sdk->getInteractionModelSchema($skillId, $stage, 'en-US');

    dump($interactionModel);
} catch (Throwable $exception) {
    dump($exception);
}

