<?php

declare(strict_types=1);

use App\Http\Action;
use Slim\App;

return static function (App $app): void {

    $app->get('/', Action\HomeAction::class);

    $app->map(['GET', 'POST'], '/weather-bot', Action\WeatherBotAction::class);

};
