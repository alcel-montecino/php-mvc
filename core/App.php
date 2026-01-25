<?php
class App {
    protected $controller = 'UserController', $method = 'index', $params = [];
    public function __construct() {
        $url = isset($_GET['url']) ? explode('/', rtrim($_GET['url'],'/')) : [];
        if(isset($url[0]) && file_exists('app/controllers/'.ucfirst($url[0]).'Controller.php')) $this->controller = ucfirst($url[0]).'Controller';
        require_once "app/controllers/{$this->controller}.php";
        $this->controller = new $this->controller;
        if(isset($url[1]) && method_exists($this->controller,$url[1])) $this->method = $url[1];
        $this->params = array_slice($url,2);
        call_user_func_array([$this->controller,$this->method],$this->params);
    }
}
