<?php

declare(strict_types=1);

use Laminas\ConfigAggregator\ConfigAggregator;
use Laminas\ConfigAggregator\PhpFileProvider;

$aggregator = new ConfigAggregator([
    new PhpFileProvider(__DIR__ . '/common/*.php'),
    new PhpFileProvider(__DIR__ . '/' . (getenv('API_ENV') ?: 'prod') .'/*.php'),

    new PhpFileProvider(__DIR__ . '/bot/weather/common/*.php'),
    new PhpFileProvider(__DIR__ . '/bot/weather/' . (getenv('API_ENV') ?: 'prod') .'/*.php'),
]);

return $aggregator->getMergedConfig();
