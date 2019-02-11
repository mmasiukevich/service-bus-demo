<?php

/**
 * PHP Service Bus demo application
 *
 * @author  Maksim Masiukevich <dev@async-php.com>
 * @license MIT
 * @license https://opensource.org/licenses/MIT
 */
declare(strict_types = 1);

namespace App\CustomerRegistration\Contracts;

use ServiceBus\Services\Contracts\ValidationFailedEvent;

/**
 * Invalid registration data
 *
 * @api
 * @see RegisterCustomer
 *
 * @property-read string $correlationId
 * @property-read array  $violations
 */
final class RegisterCustomerValidationFailed implements ValidationFailedEvent
{
    /**
     * Registration request Id
     *
     * @var string
     */
    public $correlationId;

    /**
     * List of validate violations
     *
     * [
     *    'propertyPath' => [
     *        0 => 'some message',
     *        ....
     *    ]
     * ]
     *
     * @var array<string, array<int, string>>
     */
    public $violations;

    /**
     * @inheritDoc
     */
    public static function create(string $correlationId, array $violations): ValidationFailedEvent
    {
        /** @var array<string, array<int, string>> $violations */
        return new self($correlationId, $violations);
    }

    /**
     * @param string $correlationId
     *
     * @return self
     */
    public static function duplicatePhoneNumber(string $correlationId): self
    {
        return new self($correlationId, ['phone' => ['Customer with the specified phone number is already registered']]);
    }

    /**
     * @inheritDoc
     */
    public function correlationId(): string
    {
        return $this->correlationId;
    }

    /**
     * @inheritDoc
     */
    public function violations(): array
    {
        return $this->violations;
    }

    /**
     * @param string                            $correlationId
     * @param array<string, array<int, string>> $violations
     */
    private function __construct(string $correlationId, array $violations)
    {
        $this->correlationId = $correlationId;
        $this->violations    = $violations;
    }
}
