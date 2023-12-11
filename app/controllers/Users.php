<?php

    class Users extends Controller {

        public function login(): void {
            if($_SERVER['REQUEST_METHOD'] === "POST") {
                //Process the login
            } else {
                $this->view('users/login');
            }
        }

        public function signup(): void {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Process the sign up form
            } else {
                $this->view('users/signup');
            }
        }
    }