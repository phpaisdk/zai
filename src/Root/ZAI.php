<?php

declare(strict_types=1);

namespace AiSdk;

use AiSdk\Contracts\Model;
use AiSdk\ZAI\ZAIOptions;
use AiSdk\ZAI\ZAIProvider;

final class ZAI
{
    private static ?ZAIProvider $default = null;
    /** @param array<string, mixed> $config */
    public static function create(array $config = []): ZAIProvider
    {
        return self::$default = new ZAIProvider(ZAIOptions::fromArray($config));
    }
    public static function default(): ZAIProvider
    {
        return self::$default ??= self::create();
    }
    public static function reset(): void
    {
        self::$default = null;
    }
    public static function model(string $modelId): Model
    {
        return self::default()->model($modelId);
    }
}
