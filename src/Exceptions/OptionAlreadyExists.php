<?php

/**
 * Holds exception when an option cannot be found
 *
 * @since 3.0.0
 *
 * @license MIT
 */

declare(strict_types=1);

namespace Wp\FastEndpoints\Contracts\Exceptions;

use Exception;

/**
 * Thrown when an option cannot be found
 *
 * @since 3.0.0
 *
 * @author André Gil <andre_gil22@hotmail.com>
 */
class OptionAlreadyExists extends Exception
{
    private string $optionClassName;

    public function __construct(string $optionClassName)
    {
        $this->optionClassName = $optionClassName;
        parent::__construct("'$optionClassName' is already available. Set override to false to override existent options");
    }

    public function getOptionClassName(): string
    {
        return $this->optionClassName;
    }
}
