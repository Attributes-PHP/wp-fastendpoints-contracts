<?php

/**
 * Holds interface for registering custom REST endpoints
 *
 * @since 0.9.0
 *
 * @license MIT
 */

declare(strict_types=1);

namespace Attributes\Wp\FastEndpoints\Contracts\Http;

use Attributes\Wp\FastEndpoints\Contracts\Middlewares\Middleware;

/**
 * REST Endpoint interface that registers custom WordPress REST endpoints
 *
 * @since 0.9.0
 *
 * @author André Gil <andre_gil22@hotmail.com>
 */
interface Endpoint
{
    /**
     * Registers the current endpoint using register_rest_route function.
     *
     * NOTE: Expects to be called inside the 'rest_api_init' WordPress action
     *
     * @since 0.9.0
     *
     * @param  string  $namespace  WordPress REST namespace.
     * @param  string  $restBase  Endpoint REST base.
     * @return true|false true if successfully registered a REST route or false otherwise.
     */
    public function register(string $namespace, string $restBase): bool;

    /**
     * Checks if the current user has the given WP capabilities. Example usage:
     *
     *      hasCap('edit_posts');
     *      hasCap(['edit_post', $post->ID]);
     *      hasCap(['edit_post_meta', $post->ID, $meta_key]);
     *      hasCap(['edit_post', '{post_id}']);  // Replaces {post_id} with request parameter named post_id
     *
     * @param  string  $capability  WordPress user capability to be checked against
     * @param  array  $args  Optional parameters, typically the object ID. You can also pass a future request parameter via
     *                       curly braces e.g. {post_id}
     *
     * @since 0.9.0
     */
    public function hasCap(string $capability, ...$args): self;

    /**
     * Adds a schema to validate the response and discard any additional properties.
     *
     * @since 2.0.0
     *
     * @param  string|object  $schema  Class object to be used for validating this response.
     */
    public function returns(string|object $schema): self;

    /**
     * Registers a middleware
     *
     * @since 0.9.0
     *
     * @param  Middleware  $middleware  Middleware to be attached to endpoint.
     */
    public function middleware(Middleware $middleware): self;

    /**
     * Registers a permission callback
     *
     * @since 0.9.0
     *
     * @param  callable  $permissionCb  Method to be called to check current user permissions.
     */
    public function permission(callable $permissionCb): self;

    /**
     * Specifies a set of plugins that are needed by the endpoint
     */
    public function depends(string|array $plugins): self;
}
