<?php

declare(strict_types=1);

namespace App\Http\Action;

use BotMan\BotMan\BotMan;
use Laminas\Diactoros\Response\EmptyResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class WeatherBotAction implements RequestHandlerInterface
{
    private $bot;

    public function __construct(BotMan $bot)
    {
        $this->bot = $bot;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $this->bot->listen();

        return new EmptyResponse(200);
    }
}
