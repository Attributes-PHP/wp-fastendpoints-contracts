<?php

/**
 * Holds options for where the
 *
 * @since 3.0.0
 *
 * @license MIT
 */

declare(strict_types=1);

namespace Wp\FastEndpoints\Contracts\Validation\Options;

enum From: string
{
    /**
     * Looks for parameters anywhere
     */
    case ANY = 'any';
    /**
     * Only takes into account JSON parameters
     */
    case JSON = 'json';
    /**
     * Only takes into account JSON parameters
     */
    case BODY = 'body';
    /**
     * Only takes into account JSON parameters
     */
    case FILE = 'file';
    /**
     * Only takes into account JSON parameters
     */
    case QUERY = 'query';
    /**
     * Only takes into account JSON parameters
     */
    case URL = 'url';
}
