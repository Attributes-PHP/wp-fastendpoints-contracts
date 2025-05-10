<?php

/**
 * Holds options for where the
 *
 * @since 1.2.0
 *
 * @license MIT
 */

declare(strict_types=1);

namespace Wp\FastEndpoints\Contracts\Validation\Options;

enum Alias: string
{
    /**
     * No alias specified
     */
    case NONE = 'none';
    /**
     * Only takes into account JSON parameters
     */
    case CAMEL = 'camel';
    /**
     * Only takes into account JSON parameters
     */
    case PASCAL = 'pascal';
    /**
     * Only takes into account JSON parameters
     */
    case SNAKE = 'snake';
    /**
     * Looks for kebab-case parameters
     */
    case KEBAB = 'kebab';
    /**
     * Custom function that converts the given variable into
     */
    case CUSTOM = 'custom';
}
