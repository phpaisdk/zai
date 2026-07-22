# ZAI provider for PHP AI SDK

```bash
composer require aisdk/zai
```

```php
use AiSdk\Generate;
use AiSdk\ZAI;

ZAI::create(['apiKey' => $_ENV['ZAI_API_KEY']]);

$result = Generate::text('Explain this code briefly.')
    ->model(ZAI::model('glm-5.1'))
    ->run();
```

This package uses ZAI's general OpenAI-compatible API at `/api/paas/v4`. It supports text and streaming generation, tool calling, structured output, reasoning, and image input through the portable API. Configure the coding-only endpoint (`/api/coding/paas/v4`) with `baseUrl` when your account and use case require it. See [ZAI API documentation](https://docs.z.ai/guides/develop/http/introduction) and [PHP AI SDK documentation](https://phpaisdk.com/docs/zai).
