<?php
    class Router {
       protected array $routes = [];

       public function register(string $method, string $route, string $action, array $middleware = []): void
       {
           $routePattern = '/^' . str_replace('/', '\/', $route) . '$/';
           $routePattern = preg_replace('/\{([^\/]+)\}/', '(?P<$1>[^\/]+)', $routePattern);
           $this->routes[strtoupper($method)][$routePattern] = ['action' => $action, 'middleware' => $middleware];
       }

       public function get(string $route, string $action, array $middleware = []): void {
           $this->register('GET', $route, $action, $middleware);
       }

       public function dispatch(): void {
           $requestedMethod = $_SERVER['REQUEST_METHOD'];
           $requestedRoute = $_SERVER['REQUEST_URI'];

           if (!isset($this->routes[$requestedMethod])) {
               http_response_code(404);
               echo "Method not allowed";
               return;
           }


           foreach ($this->routes[$requestedMethod] as $routePattern => $routeInfo) {
               if (preg_match($routePattern, $requestedRoute, $matches)) {
                   foreach ($routeInfo['middleware'] as $middleware) {
                       if (is_callable($middleware)) {
                           call_user_func($middleware);
                       }
                   }

                   [$controller, $method] = explode('::', $routeInfo['action']);
                   $controllerInstance = new $controller();

                   $params = array_filter($matches, function($key) {
                       return !is_numeric($key);
                   }, ARRAY_FILTER_USE_KEY);

                   call_user_func([$controllerInstance, $method], $params);
                   return;
               }
           }

           http_response_code(404);
           echo "Route not found";
       }
    }