<?php

namespace App\Command\UniProductManagement\DummyData;

use Symfony\Component\Console\Command\Command;

abstract class AbstractDummyDataCommand extends Command
{
    protected const OBJECT_KEY_PREFIX = 'DUMMY ';
    protected const PARENT_PATH = '/Unified PIM/Product Management/Products';
    protected const MAIN_IMAGE_PATH = '/UniProductManagement/Continental_20025641.jpg';
    protected const REGION_PATH = '/Unified PIM/Master Data/Regions';

    protected array $timer = [];
    protected float $timeStart;

    protected function start(): void
    {
        $this->timeStart = microtime(true);
    }

    protected function stop(string $key): void
    {
        $this->timer[$key] ??= 0;
        $this->timer[$key] += microtime(true) - $this->timeStart;
    }

    // Sorry Linus ;-)
    protected static function nf(int $number): string
    {
        return number_format($number, 0, '.', '\'');
    }
}
