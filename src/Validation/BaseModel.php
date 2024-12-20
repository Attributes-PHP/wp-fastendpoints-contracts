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
     * Where to fetch the parameters from
     */
    protected From $from;

    public function __construct(From $from = From::JSON)
    {
        $this->from = $from;
    }

    /**
     * @return array<string,mixed>
     */
    public function getConfigs(): array
    {
        return [
            'from' => $this->from,
        ];
    }
}
