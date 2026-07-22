# aisdk/zai

Official ZAI provider for the PHP AI SDK. Uses ZAI's OpenAI-compatible API.

```bash
composer require aisdk/zai
```

## Basic Usage

```php
use AiSdk\Generate;
use AiSdk\ZAI;

ZAI::create(['apiKey' => $_ENV['ZAI_API_KEY']]);

$result = Generate::text('Explain this code briefly.')
    ->model(ZAI::model('glm-5.1'))
    ->run();
```

## Configuration

| Variable | Description | Default |
| --- | --- | --- |
| `ZAI_API_KEY` | API key for authentication | Required |
| `ZAI_BASE_URL` | General API root | `https://api.z.ai/api/paas/v4` |

```php
ZAI::create([
    'apiKey' => $_ENV['ZAI_API_KEY'],
    'baseUrl' => 'https://api.z.ai/api/paas/v4',
]);
```

Use `https://api.z.ai/api/coding/paas/v4` as `baseUrl` only for ZAI's coding API when that is required by the selected account and model.

## Supported Capabilities

| Capability | Support |
| --- | --- |
| Text generation and streaming | Native OpenAI-compatible chat |
| Tool calling, structured output, reasoning | Passed through for supported models |
| Image input | Passed through for compatible vision models |

## Provider Options

Use `providerOptions('zai', ['raw' => [...]])` for documented ZAI chat-completions fields outside the portable SDK surface. Model IDs are opaque strings and are validated by ZAI.

## Documentation

- [ZAI API documentation](https://docs.z.ai/guides/develop/http/introduction)
- [PHP AI SDK documentation](https://phpaisdk.com/docs/zai)
