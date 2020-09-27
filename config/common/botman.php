<?php

declare(strict_types=1);

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Telegram\TelegramDriver;
use BotMan\Drivers\Web\WebDriver;
use Psr\Container\ContainerInterface;

return [
    BotMan::class => static function (ContainerInterface $container): BotMan {
        /** @var array $drivers */
        $drivers = $container->get('config')['botMan']['drivers'];
        foreach ($drivers as $driver) {
            DriverManager::loadDriver($driver);
        }

        /** @var array $config */
        $config = $container->get('config')['botMan']['config'];
        $bot = BotManFactory::create($config);

        $bot->setContainer($container);

        return $bot;
    },

    'config' => [
        'botMan' => [
            'config' => [
                'telegram' => [
                    'token' => 'TOKEN',
                ],
            ],
            'drivers' => [
                WebDriver::class,
                TelegramDriver::class,
            ],
        ],
    ],
];
