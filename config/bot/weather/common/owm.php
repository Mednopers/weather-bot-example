<?php

declare(strict_types=1);

use Cmfcmf\OpenWeatherMap;
use Psr\Container\ContainerInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;

return [

    OpenWeatherMap::class => static function (ContainerInterface $container) {
    /** @var array $config */
        $config = $container->get('config')['owm'];

        return new OpenWeatherMap(
            $config['apiKey'],
            $container->get(ClientInterface::class),
            $container->get(RequestFactoryInterface::class)
        );
    },

    'config' => [
        'owm' => [
            'apiKey' => 'KEY',
        ],
    ],
];
