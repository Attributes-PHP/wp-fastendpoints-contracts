<?php

/**
 * Holds the interface to easily register WordPress endpoints that have the same base URL.
 *
 * @since 0.9.0
 *
 * @license MIT
 */

declare(strict_types=1);

namespace Wp\FastEndpoints\Contracts\Http;

/**
 * An interface that helps developers in creating groups of endpoints. This way developers can aggregate
 * closely related endpoints in the same router. Example usage:
 *
 *      $usersRouter = new Router('users');
 *      $usersRouter->get(...); // Retrieve a user
 *      $usersRouter->put(...); // Update a user
 *
 *      $postsRouter = new Router('posts');
 *      $postsRouter->get(...); // Retrieve a post
 *      $postsRouter->put(...); // Update a post
 *
 * @since 0.9.0
 *
 * @author André Gil <andre_gil22@hotmail.com>
 */
interface Router
{
    /**
     * Adds a new GET endpoint
     *
     * @since 0.9.0
     *
     * @param  string  $route  Endpoint route.
     * @param  callable  $handler  User specified handler for the endpoint.
     * @param  array  $args  Same as the WordPress register_rest_route $args parameter. If set it can override the default
     *                       WP FastEndpoints arguments. Default value: [].
     * @param  bool  $override  Same as the WordPress register_rest_route $override parameter. Defaul value: false.
     */
    public function get(string $route, callable $handler, array $args = [], bool $override = false): Endpoint;

    /**
     * Adds a new POST endpoint
     *
     * @since 0.9.0
     *
     * @param  string  $route  Endpoint route.
     * @param  callable  $handler  User specified handler for the endpoint.
     * @param  array  $args  Same as the WordPress register_rest_route $args parameter. If set it can override the default
     *                       WP FastEndpoints arguments. Default value: [].
     * @param  bool  $override  Same as the WordPress register_rest_route $override parameter. Defaul value: false.
     */
    public function post(string $route, callable $handler, array $args = [], bool $override = false): Endpoint;

    /**
     * Adds a new PUT endpoint
     *
     * @since 0.9.0
     *
     * @param  string  $route  Endpoint route.
     * @param  callable  $handler  User specified handler for the endpoint.
     * @param  array  $args  Same as the WordPress register_rest_route $args parameter. If set it can override the default
     *                       WP FastEndpoints arguments. Default value: [].
     * @param  bool  $override  Same as the WordPress register_rest_route $override parameter. Defaul value: false.
     */
    public function put(string $route, callable $handler, array $args = [], bool $override = false): Endpoint;

    /**
     * Adds a new DELETE endpoint
     *
     * @since 0.9.0
     *
     * @param  string  $route  Endpoint route.
     * @param  callable  $handler  User specified handler for the endpoint.
     * @param  array  $args  Same as the WordPress register_rest_route $args parameter. If set it can override the default
     *                       WP FastEndpoints arguments. Default value: [].
     * @param  bool  $override  Same as the WordPress register_rest_route $override parameter. Defaul value: false.
     */
    public function delete(string $route, callable $handler, array $args = [], bool $override = false): Endpoint;

    /**
     * Includes a router as a sub router
     *
     * @since 0.9.0
     *
     * @param  Router  $router  REST sub router.
     */
    public function includeRouter(Router &$router): void;

    /**
     * Includes a router as a sub router
     *
     * @param  string  $dir  Directory path where to look for JSON schemas.
     * @param  string  $uriPrefix  Prefix used to associate schema directory.
     *
     * @since 0.9.0
     */
    public function appendSchemaDir(string $dir, string $uriPrefix): void;

    /**
     * Adds all actions required to register the defined endpoints
     *
     * @since 0.9.0
     */
    public function register(): void;

    /**
     * Creates and retrieves a new endpoint instance
     *
     * @since 0.9.0
     *
     * @param  string  $method  POST, GET, PUT or DELETE or a value from WP_REST_Server (e.g. WP_REST_Server::EDITABLE).
     * @param  string  $route  Endpoint route.
     * @param  callable  $handler  User specified handler for the endpoint.
     * @param  array  $args  Same as the WordPress register_rest_route $args parameter. If set it can override the default
     *                       WP FastEndpoints arguments. Default value: [].
     * @param  bool  $override  Same as the WordPress register_rest_route $override parameter. Default value: false.
     */
    public function endpoint(
        string $method,
        string $route,
        callable $handler,
        array $args = [],
        bool $override = false
    ): Endpoint;

    /**
     * Retrieves all the attached endpoints
     *
     * @return array<Endpoint>
     */
    public function getEndpoints(): array;

    /**
     * Retrieves all attached sub-routers
     *
     * @return array<Router>
     */
    public function getSubRouters(): array;

    /**
     * Specifies a set of plugins that are needed by this router and all sub-routers
     */
    public function depends(string|array $plugins): self;
}
