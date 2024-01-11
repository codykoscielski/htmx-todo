<?php

    class Dashboard extends Controller {

        public function __construct() {
            $this->todoModel = $this->model('Todo');
        }
        public function index(): void {

            $todoList = $this->todoModel->getAllTodos();
            $data = [
                'todo' => $todoList
            ];
            $this->view('layouts/_dashboard', [
                'todoContent' => $this->partial('/todoPartial', $data)
            ]);
        }

        public function addToDo(): void {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {

                $_POST = filter_input_array(htmlspecialchars(INPUT_POST));

                $data = [
                    'todo' => trim($_POST['todo']),
                    'id' => 1
                ];
            }
        }
    }