<?php

declare(strict_types=1);
use AiSdk\Generate;
use AiSdk\Support\Sdk;
use AiSdk\ZAI;
use AiSdk\ZAI\Tests\Fakes\FakeHttpClient;
use Nyholm\Psr7\Factory\Psr17Factory;

afterEach(function (): void {
    Generate::reset();
    ZAI::reset();
});
it('uses ZAI general OpenAI-compatible chat completions', function (): void {
    $client = new FakeHttpClient(200, json_encode(['id' => 'zai-chat', 'model' => 'glm-5.1', 'choices' => [['message' => ['content' => 'Hello from ZAI'], 'finish_reason' => 'stop']], 'usage' => ['prompt_tokens' => 3, 'completion_tokens' => 4]]));
    $factory = new Psr17Factory();
    Generate::configure(new Sdk($client, $factory, $factory));
    ZAI::create(['apiKey' => 'zai-test']);
    $result = Generate::text('Hi')->model(ZAI::model('glm-5.1'))->run();
    expect($result->text)->toBe('Hello from ZAI')->and((string) $client->lastRequest?->getUri())->toBe('https://api.z.ai/api/paas/v4/chat/completions')->and($client->lastRequest?->getHeaderLine('Authorization'))->toBe('Bearer zai-test')->and($client->sentBody()['model'])->toBe('glm-5.1');
});
it('accepts opaque ZAI model identifiers', function (): void {
    ZAI::create(['apiKey' => 'zai-test']);
    expect(ZAI::model('private-glm')->modelId())->toBe('private-glm');
});
