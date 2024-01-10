<?php

    class Dashboard extends Controller {

        public function index(): void {
            $this->view('layouts/_dashboard');
        }
    }