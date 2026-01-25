<?php
class ApiController extends Controller {

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
}
