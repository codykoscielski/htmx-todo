<?php
    class Pages extends Controller {
        public function __construct() {

        }

        public function index(): void {
            $this->view('pages/index');
        }

    }