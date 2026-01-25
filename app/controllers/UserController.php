<?php
class UserController extends Controller {
    public function index(){
        $users = $this->model('User')->all();
        $this->view('users/list',['users'=>$users]);
    }

    public function add(){
        $model = $this->model('User');
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $success = $model->add($_POST['name'],$_POST['email'],$_POST['password']);
            if(isset($_POST['ajax'])){
                echo json_encode(['success'=>$success]);
                return;
            }
            header('Location:/mvc-crud/');
        }
        $this->view('users/add');
    }

    public function edit($id){
        $model = $this->model('User');
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $success = $model->update($id,$_POST['name'],$_POST['email']);
            if(isset($_POST['ajax'])){
                echo json_encode(['success'=>$success]);
                return;
            }
            header('Location:/mvc-crud/');
        }
        $user = $model->get($id);
        $this->view('users/edit',['user'=>$user]);
    }

    public function delete($id){
        $success = $this->model('User')->delete($id);
        if(isset($_GET['ajax'])){
            echo json_encode(['success'=>$success,'id'=>$id]);
            return;
        }
        header('Location:/mvc-crud/');
    }
}
