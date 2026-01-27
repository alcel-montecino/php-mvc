<?php
// User Controller
class UserController extends Controller {

    public function index() {
        $users = $this->model('User')->all();
        $this->view('users/list', ['users' => $users]);
    }

    public function add() {
        $model = $this->model('User');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $success = $model->add($name, $email, $password);

            if (isset($_POST['ajax'])) {
                echo json_encode(['success' => $success]);
                return;
            }

            header('Location: /');
            exit;
        }

        $this->view('users/add', [], false);
    }

    public function edit($id) {
        $model = $this->model('User');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';

            $success = $model->update($id, $name, $email);

            if (isset($_POST['ajax'])) {
                echo json_encode(['success' => $success]);
                return;
            }

            header('Location: /');
            exit;
        }

        $user = $model->get($id);
        $this->view('users/edit', ['user' => $user], false);
    }

    public function delete($id) {
        $success = $this->model('User')->delete($id);

        if (isset($_GET['ajax'])) {
            echo json_encode(['success' => $success, 'id' => $id]);
            return;
        }

        header('Location: /');
        exit;
    }
}
