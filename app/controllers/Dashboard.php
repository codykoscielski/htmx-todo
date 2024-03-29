<?php

    class Dashboard extends Controller {

        private int $user_id;
        public function __construct() {
            if(!isLoggedIn()) {
                redirect('/auth');
            }
            $this->todoModel = $this->model('Todo');
            $this->user_id = $_SESSION['user_id'];
        }


        public function index(): void {
            $todoList = $this->todoModel->getAllTodos($this->user_id);
            $data = [
                'todo' => $todoList
            ];
            $this->view('layouts/_dashboard', [
                'todoContent' => $this->partial('/todoPartial', $data)
            ]);
        }

        public function getTodo(int $id): void {
            $todo = $this->todoModel->getTodoById($id);
            $data = [
                'todo' => $todo
            ];
            echo $this->partial('/singleTodoPartial', $data);
        }

        public function addToDo(): void {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {

                $_POST = filter_input_array(htmlspecialchars(INPUT_POST));

                $data = [
                    'todo' => trim($_POST['todo']),
                    'user_id' => $this->user_id
                ];

                $addNewTodo = $this->todoModel->addNewTodo($data);
                if($addNewTodo) {
                    $allTodos = $this->todoModel->getAllTodos($this->user_id);
                    $data = [
                        'todo' => $allTodos
                    ];
                   echo $this->partial('/todoPartial', $data);
                }
            }
        }

        public function editTodo(int $id): void {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $_POST = filter_input_array(htmlspecialchars(INPUT_POST));
                $data = [
                    'id' => $id,
                    'todo' => trim($_POST['todo'])
                ];
                $editTodo = $this->todoModel->editTodo($data);
                if($editTodo) {
                    $todo = $this->todoModel->getTodoById($id);
                    $data = [
                        'todo' => $todo
                    ];
                    echo $this->partial('/singleTodoPartial', $data);
                }
            } else {
                $todo = $this->todoModel->getTodoById($id);
                $data = [
                    'todo' => $todo
                ];
                echo $this->partial('/editTodoPartial', $data);
            }
        }

        public function completeTodo(int $id): void {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
               $completedTodo = $this->todoModel->completeTodo($id);
               if($completedTodo) {
                   //render all the todos again
                   $allTodos = $this->todoModel->getAllTodos($this->user_id);
                   $data = [
                       'todo' => $allTodos
                   ];
                   echo $this->partial('/todoPartial', $data);
               }
            }
        }

        public function deleteTodo($id): void {
            if($_SERVER['REQUEST_METHOD'] === 'DELETE') {
                $deleteTodo = $this->todoModel->deleteTodo($id);
                if($deleteTodo) {
                    $allTodos = $this->todoModel->getALlTodos($this->user_id);
                    $data = [
                        'todo' => $allTodos
                    ];
                    echo $this->partial('/todoPartial', $data);
                }
            }
        }
    }