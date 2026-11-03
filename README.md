# PHP AI SDK — Z.AI

Text generation, streaming, reasoning, and tool calling with GLM models. Part of the framework-agnostic [PHP AI SDK](https://phpaisdk.com).

## Installation

```bash
composer require aisdk/zai
```

Set `ZAI_API_KEY` in your environment.

## Usage

```php
use AiSdk\Generate;
use AiSdk\ZAI;

$result = Generate::text('Explain closures in PHP in one sentence.')
    ->model(ZAI::model('glm-5.3'))
    ->run();

echo $result->text;
```

## Documentation

[Read the documentation](https://phpaisdk.com/docs/0.x/providers/zai) for configuration, supported features, and more examples.

[Contributing](https://github.com/phpaisdk/.github/blob/main/CONTRIBUTING.md) · [Support](https://github.com/phpaisdk/.github/blob/main/SUPPORT.md)

## License

The MIT License (MIT). See [LICENSE](LICENSE) for details.
