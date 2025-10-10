<?php

/**
 * Holds the interface to easily register WordPress endpoints that have the same base URL.
 *
 * @license MIT
 */

declare(strict_types=1);

namespace Attributes\Wp\FastEndpoints\Contracts\Http;

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
 * @author André Gil <andre_gil22@hotmail.com>
 */
interface Router
{
    /**
     * Adds a new GET endpoint
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
     * @param  Router  $router  REST sub router.
     */
    public function includeRouter(Router &$router): void;

    /**
     * Adds all actions required to register the defined endpoints
     */
    public function register(): void;

    /**
     * Creates and retrieves a new endpoint instance
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

    /**
     * Adds a dependency which can then be injected in endpoints, middlewares or permission handlers.
     *
     * This should be useful to share common dependencies across multiple handlers e.g. database connection.
     * The dependency will be instantiated once, only!
     *
     *
     * @param  string  $name  The dependency name.
     * @param  callable  $handler  The handler which resolves the dependency.
     * @param  bool  $override  If set, overrides any existent dependency. Default value: false.
     */
    public function inject(string $name, callable $handler, bool $override = false): self;

    /**
     * Adds a handler for a given exception.
     *
     * Handlers will be resolved on the following order: 1) by same exact exception or 2) by a parent class
     *
     * @param  string  $exceptionClass  The exception class to add a handler.
     * @param  callable  $handler  The handler to resolve those types of exceptions.
     * @param  bool  $override  If set, overrides any existent handlers. Default value: false.
     */
    public function onException(string $exceptionClass, callable $handler, bool $override = false): self;
}
