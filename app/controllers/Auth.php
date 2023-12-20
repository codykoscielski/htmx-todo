<?php

    class Auth extends Controller {

        public function index(): void {
            $this->view('layouts/_authlayout', [
                'content' => $this->partial('login')
            ]);
        }

        public function signup(): void {
           echo $this->partial('signup');
        }

        public function login(): void {
            echo $this->partial('login');
        }
    }