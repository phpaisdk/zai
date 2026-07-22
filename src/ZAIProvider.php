<?php

declare(strict_types=1);

namespace AiSdk\ZAI;

use AiSdk\Contracts\BaseProvider;
use AiSdk\Contracts\TextModelInterface;
use AiSdk\Contracts\TextProviderInterface;
use AiSdk\ZAI\Models\ZAITextModel;

final class ZAIProvider extends BaseProvider implements TextProviderInterface
{
    public function __construct(public readonly ZAIOptions $options) {}
    public function name(): string
    {
        return ZAIOptions::PROVIDER_NAME;
    }
    protected function textModel(string $modelId): TextModelInterface
    {
        return new ZAITextModel($modelId, $this->options);
    }
}
