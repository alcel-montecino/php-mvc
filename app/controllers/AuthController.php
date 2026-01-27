<?php
class AuthController extends Controller {

    public function index() {
        // Check if user is already logged in
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            header('Location: /home');
            exit; // stop further execution
        }
         $db = new Database();
        $stmt = $db->query("SELECT * FROM users");
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        // Debug output
        // echo "<pre>";
        // var_dump($user);   // show the database record fetched
        // echo "</pre>";
        $this->view('auth/login', ['error' => null, 'noHeader' => true]);
    }

    public function login() {
         $db = new Database();
        $stmt = $db->query("SELECT * FROM users");
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $error = null;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if (Auth::login($email, $password)) {
                header('Location: /home');
                exit;
            } else {
                $error = "Invalid email or password";
            }
        }
        $this->view('auth/login', ['error' => $error, 'noHeader' => true]);
    }

    public function register() {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (Auth::register($_POST['name'], $_POST['email'], $_POST['password'])) {
                header('Location:/auth/login');  // after register, go to login
                exit;
            } else {
                $error = "Registration failed. Try again.";
            }
        }
        $this->view('auth/register', ['error' => $error, 'noHeader' => true]);
    }

    public function logout() {
        Auth::logout();
        header('Location:/auth/login');  // redirect after logout
        exit;
    }
}
