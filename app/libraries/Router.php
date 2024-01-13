<?php
class Router {
    // Array to store registered routes
    protected array $routes = [];

    // Method to register a route with the router
    public function register(string $method, string $route, string $action, array $middleware = []): void {
        // Convert the route to a regular expression to capture named parameters
        $routePattern = '/^' . str_replace('/', '\/', $route) . '$/';
        // Replace placeholders with regex to capture named parameters
        $routePattern = preg_replace('/\{([^\/]+)\}/', '(?P<$1>[^\/]+)', $routePattern);
        // Store the route information in the routes array
        $this->routes[strtoupper($method)][$routePattern] = ['action' => $action, 'middleware' => $middleware];
    }

    // Shortcut method for registering a GET route
    public function get(string $route, string $action, array $middleware = []): void {
        $this->register('GET', $route, $action, $middleware);
    }

    // Shortcut method for registering a POST route
    public function post(string $route, string $action, array $middleware = []): void {
        $this->register('POST', $route, $action, $middleware);
    }

    // Shortcut method for registering a DELETE route
    public function delete(string $route, string $action, array $middleware = []): void {
        $this->register('DELETE', $route, $action, $middleware);
    }

    public function put(string $route, string $action, array $middleware = []): void {
        $this->register('PUT', $route, $action, $middleware);
    }
    // Dispatches the request to the appropriate route action
    public function dispatch(): void {
        // Get the requested method and URI from the server variables
        $requestedMethod = $_SERVER['REQUEST_METHOD'];
        $requestedRoute = $_SERVER['REQUEST_URI'];

        // Check if the requested method is registered in the router
        if (!isset($this->routes[$requestedMethod])) {
            http_response_code(404);
            echo "Method not allowed";
            return;
        }

        // Iterate over the routes for the requested method
        foreach ($this->routes[$requestedMethod] as $routePattern => $routeInfo) {
            // Check if the requested route matches the route pattern
            if (preg_match($routePattern, $requestedRoute, $matches)) {
                // Execute any middleware associated with the route
                foreach ($routeInfo['middleware'] as $middleware) {
                    if (is_callable($middleware)) {
                        call_user_func($middleware);
                    }
                }

                // Split the action into controller and method
                [$controller, $method] = explode('::', $routeInfo['action']);
                // Instantiate the controller
                $controllerInstance = new $controller();

                // Manually build the params array
                $params = [];
                foreach ($matches as $key => $value) {
                    if (!is_numeric($key)) {
                        // Convert the parameter to an integer if it's numeric
                        $params[$key] = is_numeric($value) ? (int)$value : $value;
                    }
                }

                // If there's exactly one integer parameter, pass it directly
                if (count($params) === 1 && is_int(current($params))) {
                    // Directly pass the single integer parameter
                    call_user_func([$controllerInstance, $method], current($params));
                } else {
                    // Otherwise, pass all parameters as an associative array
                    call_user_func([$controllerInstance, $method], $params);
                }

                return;
            }
        }

        // If no route is found, return a 404 response
        http_response_code(404);
        echo "Route not found";
    }
}
?>
