<?php declare(strict_types=1);

require_once __DIR__.'/bootstrap.php';

try {
    $skillManifest = $sdk->getSkillInformation($skillId, $stage);

    dump($skillManifest);
} catch (Throwable $exception) {
    dump($exception);
}

