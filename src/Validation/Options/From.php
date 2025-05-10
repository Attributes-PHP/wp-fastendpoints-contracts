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

use WP_REST_Request;

enum From: string
{
    /**
     * Looks for parameters anywhere e.g. WP_REST_Request::get_params()
     */
    case ANY = 'any';
    /**
     * Only takes into account JSON parameters e.g. WP_REST_Request::get_json_params()
     */
    case JSON = 'json';
    /**
     * Only takes into account body parameters e.g. WP_REST_Request::get_body_params()
     */
    case BODY = 'body';
    /**
     * Only takes into account file parameters e.g. WP_REST_Request::get_file_params()
     */
    case FILE = 'file';
    /**
     * Only takes into account query parameters e.g. WP_REST_Request::get_query_params()
     */
    case QUERY = 'query';
    /**
     * Only takes into account url parameters e.g. WP_REST_Request::get_url_params()
     */
    case URL = 'url';
}
