<?php declare(strict_types=1);

use Buzz\Client\FileGetContents;
use Nyholm\Psr7\Factory\Psr17Factory;
use Omissis\AlexaSdk\Model\Skill;
use Omissis\AlexaSdk\Psr\Http\Client\LoggingClientDecorator;
use Omissis\AlexaSdk\Sdk;
use Omissis\AlexaSdk\Sdk\OAuthToken;
use Omissis\AlexaSdk\Serializer\Symfony\SymfonyDeserializerAdapter;
use Omissis\AlexaSdk\Serializer\Symfony\SymfonySerializerAdapter;
use Symfony\Component\Dotenv\Dotenv;

require_once dirname(__DIR__).'/vendor/autoload.php';

(new Dotenv())->load(dirname(__DIR__).'/.env');

$httpRequestFactory = new Psr17Factory();
$client = new LoggingClientDecorator(new FileGetContents($httpRequestFactory));
$serializer = new SymfonySerializerAdapter();
$deserializer = new SymfonyDeserializerAdapter();
$apiBaseUrl = getenv('PHP_ASK_SDK_API_BASE_URL');
$token = OAuthToken::fromEnv();

$sdk = new Sdk($client, $httpRequestFactory, $serializer, $deserializer, $apiBaseUrl, $token);

$skillId = new Skill\Id(getenv('PHP_ASK_SDK_SKILL_ID'));
$stage = new Skill\Stage('development');

try {
    $skillManifest = $sdk->getSkillInformation($skillId, $stage);

    dump($skillManifest);
} catch (Throwable $exception) {
    dump($exception);
}

