#!/usr/bin/env php
<?php

/**
 * PHP Service Bus (CQS implementation) Demo application
 *
 * @author  Maksim Masiukevich <desperado@minsk-info.ru>
 * @license MIT
 * @license https://opensource.org/licenses/MIT
 */

declare(strict_types = 1);

include_once __DIR__ . '/../vendor/autoload.php';

use Desperado\ServiceBusDemo\Application\Bootstrap;
use Desperado\Domain\ThrowableFormatter;
use Desperado\ServiceBus\HttpServer\HttpServerConfiguration;

try
{
    $bootstrap = Bootstrap::boot(
        __DIR__ . '/..',
        __DIR__ . '/../cache',
        __DIR__ . '/../.env'
    );
}
catch(\Throwable $throwable)
{
    echo ThrowableFormatter::toString($throwable) . \PHP_EOL;
}
