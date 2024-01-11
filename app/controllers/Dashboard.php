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
                    'user_id' => 1
                ];

                $addNewTodo = $this->todoModel->addNewTodo($data);
                if($addNewTodo) {
                    $allTodos = $this->todoModel->getAllTodos();
                    $data = [
                        'todo' => $allTodos
                    ];
                   echo $this->partial('/todoPartial', $data);
                }
            }
        }

        public function deleteTodo($id): void {
            if($_SERVER['REQUEST_METHOD'] === 'DELETE') {
                dd($id);
            }
        }
    }