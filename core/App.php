<?php
class App {
    protected $controller = 'AuthController'; // default
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();

        // Controller
        if(isset($url[0]) && file_exists(__DIR__ . '/../app/controllers/' . ucfirst($url[0]) . 'Controller.php')) {
            $this->controller = ucfirst($url[0]) . 'Controller';
            unset($url[0]);
        }

        require_once __DIR__ . '/../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Method
        if(isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // Parameters
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    protected function parseUrl() {
        $uri = trim($_SERVER['REQUEST_URI'], '/'); // remove starting slash
        // Remove any query string
        $uri = explode('?', $uri)[0];
        $segments = explode('/', $uri);

        return $segments;
    }
}
