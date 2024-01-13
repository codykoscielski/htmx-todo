<?php

    class Auth extends Controller {

        public function __construct() {
            $this->adminModel = $this->model('Admin');
        }

        public function index(): void {
            $this->view('layouts/_authlayout', [
                'content' => $this->partial('login')
            ]);
        }

        public function signup(): void {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $_POST = filter_input_array(htmlspecialchars(INPUT_POST));

                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['confirmPassword'])
                ];

                //TODO: Add validation later on

                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                $addUser = $this->adminModel->registerNewUser($data);
                if($addUser) {
                    echo 'user added';
                } else {
                    echo 'there was an issue';
                }
            } else {
                if(isset($_SERVER['HTTP_HX_REQUEST']) && $_SERVER['HTTP_HX_REQUEST'] === 'true') {
                    echo $this->partial('signup');
                } else {
                    redirect('/auth');
                }
            }
        }

        public function login(): void {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $_POST = filter_input_array(htmlspecialchars(INPUT_POST));
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password'])
                ];

                $loggedinUser = $this->adminModel->login($data);
                if($loggedinUser) {
                    dd($loggedinUser);
                }
            }
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                // Check to see if the request is coming from HTMX
                if (isset($_SERVER['HTTP_HX_REQUEST']) && $_SERVER['HTTP_HX_REQUEST'] === 'true') {
                    echo $this->partial('login');
                } else {
                    redirect('/auth');
                }
            }
        }

        private function createUserSessoin(): void {
            session_regenerate_id(true);
        }
    }