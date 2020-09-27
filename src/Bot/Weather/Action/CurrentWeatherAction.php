<?php

declare(strict_types=1);

namespace App\Bot\Weather\Action;

use BotMan\BotMan\BotMan;
use Cmfcmf\OpenWeatherMap;

class CurrentWeatherAction
{
    private $owm;

    public function __construct(OpenWeatherMap $owm)
    {
        $this->owm = $owm;
    }

    public function handle(BotMan $bot, string $city): void
    {
        try {
            $weather = $this->owm->getWeather($city, 'metric', 'ru');
            $temperature = $weather->temperature->now;

            $bot->reply(sprintf('Temperature in the %s: %s', $city, $temperature->getFormatted()));
        } catch (OpenWeatherMap\Exception $e) {
            $bot->reply('OpenWeatherMap exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').');
        } catch (\Exception $e) {
            $bot->reply('General exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').');
        }
    }
}
