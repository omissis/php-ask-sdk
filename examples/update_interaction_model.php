<?php declare(strict_types=1);

use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\Description;
use Omissis\AlexaSdk\Model\Skill\InteractionModelSchema\InteractionModel\LanguageModel\InvocationName;
use Omissis\AlexaSdk\Model\Skill\UpdateInteractionModelSchema;

require_once __DIR__.'/bootstrap.php';

try {
    $interactionModelSchema = $sdk->getInteractionModelSchema($skillId, $stage, 'en-US');

    $interactionModelSchema->getInteractionModel()->getLanguageModel()->setInvocationName(new InvocationName('my drupal commerce ' . get_random_string()));

    $sdk->updateInteractionModelSchema(
        $skillId,
        $stage,
        'en-US',
        new UpdateInteractionModelSchema($interactionModelSchema->getInteractionModel(), new Description('foobar'))
    );

    dump($interactionModelSchema);
} catch (Throwable $exception) {
    dump($exception);
}

function get_random_string(): string
{
    return substr(str_shuffle(str_repeat('abcdefghijklmnopqrstuvwxyz', random_int(1, 10))), 1, 10);
}
