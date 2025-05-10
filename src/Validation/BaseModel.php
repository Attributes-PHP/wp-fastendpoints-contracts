<?php

/**
 * Holds a base class for validating data via the Symfony validator
 *
 * @since 1.2.0
 *
 * @license MIT
 */

declare(strict_types=1);

namespace Wp\FastEndpoints\Contracts\Validation;

use Wp\FastEndpoints\Contracts\Validation\Options\Alias;
use Wp\FastEndpoints\Contracts\Validation\Options\From;

/**
 * Contract for creating request validation models.
 *
 *      use Symfony\Component\Validator\Constraints as Assert;
 *
 *       class MyCustomData extends BaseModel {
 *          #[Assert\NotBlank]
 *          public string $name;
 *
 *          #[Assert\Email]
 *          public string $email;
 *       }
 *
 * @since 1.2.0
 *
 * @author André Gil <andre_gil22@hotmail.com>
 */
abstract class BaseModel
{
    /**
     * Holds options to be applied to validation model
     *
     * @internal
     *
     * @var array<\UnitEnum>
     */
    private array $_options = [];

    public function __construct(From $from = From::JSON, Alias $alias = Alias::NONE)
    {
        $this->_options[] = $from;
        $this->_options[] = $alias;
    }

    /**
     * Retrieves the current options to be applied to model
     *
     * @return array<\UnitEnum>
     */
    public function getOptions(): array
    {
        return $this->_options;
    }
}
