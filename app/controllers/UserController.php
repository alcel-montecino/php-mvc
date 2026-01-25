<?php
require_once 'core/Controller.php';
class UserController extends Controller {

    public function index() {
        $users = $this->model('User')->getAll();
        $this->view('users/list', ['users'=>$users]);
    }

    public function view($view, $data = []) {
        $viewPath = "app/views/$view.php";
        require 'app/views/layout.php';
    }

    public function add() {
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $this->model('User')->add($_POST['name'],$_POST['email']);
            header('Location: /mvc-crud/');
        }
        $this->view('users/add');
    }

    public function edit($id) {
        $model = $this->model('User');
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $model->update($id,$_POST['name'],$_POST['email']);
            header('Location: /mvc-crud/');
        }
        $user = $model->get($id);
        $this->view('users/edit',['user'=>$user]);
    }

    public function delete($id){
        $this->model('User')->delete($id);
        header('Location: /mvc-crud/');
    }
}
