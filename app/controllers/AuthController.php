<?php
class AuthController extends Controller {
    public function login(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(Auth::login($_POST['email'],$_POST['password'])){
                header('Location:/mvc-crud/');
            } else {
                $error = "Invalid email or password";
            }
        }
        $this->view('auth/login',['error'=>$error ?? null]);
    }

    public function logout(){
        Auth::logout();
        header('Location:/mvc-crud/auth/login');
    }
}
