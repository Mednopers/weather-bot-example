<?php

declare(strict_types=1);

use GuzzleHttp\Client;
use Laminas\Diactoros\RequestFactory;
use Laminas\Diactoros\ResponseFactory;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseFactoryInterface;

return [
    ClientInterface::class => static function (): ClientInterface {
        return new Client();
    },

    RequestFactoryInterface::class => static function (): RequestFactoryInterface {
        return new RequestFactory();
    },

    ResponseFactoryInterface::class => static function (): ResponseFactoryInterface {
        return new ResponseFactory();
    },
];
