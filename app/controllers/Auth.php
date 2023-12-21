<?php

    class Auth extends Controller {

        public function index(): void {
            $this->view('layouts/_authlayout', [
                'content' => $this->partial('login')
            ]);
        }

        public function signup(): void {
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                // check to see if the request is coming from HTMX
                if (isset($_SERVER['HTTP_HX_REQUEST']) && $_SERVER['HTTP_HX_REQUEST'] === 'true') {
                    echo $this->partial('signup');
                } else {
                    redirect('/auth');
                }
            }
        }

        public function login(): void {
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                // Check to see if the request is coming from HTMX
                if (isset($_SERVER['HTTP_HX_REQUEST']) && $_SERVER['HTTP_HX_REQUEST'] === 'true') {
                    echo $this->partial('login');
                } else {
                    redirect('/auth');
                }
            }
        }
    }