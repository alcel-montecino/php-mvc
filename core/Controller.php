<?php

class Controller {
    public function model($model) {
        $modelFile = __DIR__ . '/../app/models/' . $model . '.php';
        if(!file_exists($modelFile)){
            die("Model file $modelFile not found!");
        }
        require_once $modelFile;
        return new $model();
    }

    public function view($view, $data = [], $useLayout = true) {
        $viewFile = __DIR__ . '/../app/views/' . $view . '.php';
        if(!file_exists($viewFile)){
            die("View file $viewFile not found!");
        }

        // Make $data keys available as variables
        extract($data); 

        if ($useLayout) {
            // Pass $viewFile to layout
            require __DIR__ . '/../app/views/layout.php';
        } else {
            // Render the view directly (for modal/AJAX)
            require $viewFile;
        }
    }
    
}
