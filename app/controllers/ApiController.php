<?php
class ApiController extends Controller {

    public function index($params = []) {
        $viewFile = __DIR__ . '/../views/api/index.php';
        $layoutFile = __DIR__ . '/../views/layout.php';

        if (!file_exists($viewFile) || !file_exists($layoutFile)) {
            die('View or layout file not found');
        }

        // Load layout, which will include $viewFile
        require $layoutFile;
    }

    // GET /api/users
    public function users(){
        $model = $this->model('User');
        $users = $model->all();
        header('Content-Type: application/json');
        echo json_encode($users);
    }

    // GET /api/users/{id}
    public function user($id){
        $model = $this->model('User');
        $user = $model->get($id);
        header('Content-Type: application/json');
        echo json_encode($user);
    }

    // POST /api/users
    public function createUser(){
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            http_response_code(405); // Method not allowed
            echo json_encode(['error'=>'Method not allowed']);
            return;
        }

        $data = json_decode(file_get_contents('php://input'), true);
        if(!$data || !isset($data['name'],$data['email'],$data['password'])){
            http_response_code(400);
            echo json_encode(['error'=>'Missing fields']);
            return;
        }

        $model = $this->model('User');
        $success = $model->add($data['name'], $data['email'], $data['password']);

        echo json_encode(['success'=>$success]);
    }

    // PUT /api/users/{id}
    public function updateUser($id){
        if($_SERVER['REQUEST_METHOD'] !== 'PUT'){
            http_response_code(405);
            echo json_encode(['error'=>'Method not allowed']);
            return;
        }

        $data = json_decode(file_get_contents('php://input'), true);
        if(!$data || !isset($data['name'],$data['email'])){
            http_response_code(400);
            echo json_encode(['error'=>'Missing fields']);
            return;
        }

        $model = $this->model('User');
        $success = $model->update($id, $data['name'], $data['email']);

        echo json_encode(['success'=>$success]);
    }

    // DELETE /api/users/{id}
    public function deleteUser($id){
        if($_SERVER['REQUEST_METHOD'] !== 'DELETE'){
            http_response_code(405);
            echo json_encode(['error'=>'Method not allowed']);
            return;
        }

        $model = $this->model('User');
        $success = $model->delete($id);

        echo json_encode(['success'=>$success]);
    }

    // GET /api/posts
    public function posts() {
        $model = $this->model('Post'); // assuming you have a Post model
        $posts = $model->all();
        header('Content-Type: application/json');
        echo json_encode($posts);
    }

    // GET /api/posts/{id}
    public function post($id) {
        $model = $this->model('Post');
        $post = $model->get($id);
        header('Content-Type: application/json');
        echo json_encode($post);
    }

    // POST /api/posts
    public function createPost() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405); // Method not allowed
            header('Content-Type: application/json');
            echo json_encode(['error'=>'Method not allowed']);
            return;
        }

        $data = json_decode(file_get_contents('php://input'), true);

        if (!$data || !isset($data['title'], $data['content'])) {
            http_response_code(400); // Bad Request
            header('Content-Type: application/json');
            echo json_encode(['error'=>'Missing fields: title and content required']);
            return;
        }

        // Sanitize input
        $title = htmlspecialchars(trim($data['title']));
        $content = htmlspecialchars(trim($data['content']));

        $model = $this->model('Post');
        $success = $model->add($title, $content);

        header('Content-Type: application/json');
        echo json_encode(['success'=>$success]);
    }

    // PUT /api/posts/{id}
    public function updatePost($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
            http_response_code(405);
            header('Content-Type: application/json');
            echo json_encode(['error'=>'Method not allowed']);
            return;
        }

        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data || !isset($data['title'], $data['content'])) {
            http_response_code(400);
            header('Content-Type: application/json');
            echo json_encode(['error'=>'Missing fields']);
            return;
        }

        $title = htmlspecialchars(trim($data['title']));
        $content = htmlspecialchars(trim($data['content']));

        $model = $this->model('Post');
        $success = $model->update($id, $title, $content);

        header('Content-Type: application/json');
        echo json_encode(['success'=>$success]);
    }

    // DELETE /api/posts/{id}
    public function deletePost($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
            http_response_code(405);
            header('Content-Type: application/json');
            echo json_encode(['error'=>'Method not allowed']);
            return;
        }

        $model = $this->model('Post');
        $success = $model->delete($id);

        header('Content-Type: application/json');
        echo json_encode(['success'=>$success]);
    }
}
