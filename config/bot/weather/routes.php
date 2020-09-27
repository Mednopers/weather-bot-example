<?php

declare(strict_types=1);

use App\Bot\Weather\Action;
use BotMan\BotMan\BotMan;

return static function (BotMan $bot) {

    $bot->hears('current weather in {city}', Action\CurrentWeatherAction::class . '@handle');

};
