<?php
class HomeController extends Controller {
    public function index($params = []) {
        $this->view('home');
    }
}