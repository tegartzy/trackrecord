<?php

namespace Tegarsatria\trackrecord\FoxMind\app;

class router{
    private static array $routes = [];

    public static function add(string $path, string $method, string $controller, string $function): void 
    {
        self::$routes[] = [
            'path' => $path,
            'method' => $method,
            'controller' => $controller,
            'function' => $function
        ];
    }

    public static function run(): void
    {
        $path = '/';
        if (isset($_SERVER['PATH_INFO'])) {
            $path = $_SERVER['PATH_INFO'];
        }

        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            if ($path == $route['path'] && $method == $route['method']) {
                
                $controller = new $route['controller'];
                $function = $route['function'];
                $controller->$function();

                return;
                
            }
        }
        http_response_code(404);
        echo "Controller Not Found";
    }
}
?>