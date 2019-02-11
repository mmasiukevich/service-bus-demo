<?php

/**
 * PHP Service Bus demo application
 *
 * @author  Maksim Masiukevich <dev@async-php.com>
 * @license MIT
 * @license https://opensource.org/licenses/MIT
 */
declare(strict_types = 1);

namespace App\Vehicle;

use ServiceBus\EventSourcing\AggregateId;

/**
 * Vehicle aggregate id
 */
final class VehicleId extends AggregateId
{

}
