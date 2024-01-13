<?php

    class Todo {

        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getAllTodos(): array | null{
            $this->db->query('SELECT * FROM todos');
            return $this->db->resultSet();
        }

        public function getTodoById(int $id): object | null {
            $this->db->query('SELECT * FROM todos WHERE id = :id');
            $this->db->bind(':id', $id);

            return $this->db->single();
        }

        public function addNewTodo(array $data): bool {
            $this->db->query('INSERT INTO todos(user_id, todo) values (:user_id, :todo)');
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':todo', $data['todo']);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function deleteTodo(int $id): bool {
            $this->db->query('DELETE FROM todos WHERE id = :id');
            $this->db->bind(':id', $id);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function editTodo(array $data): bool {
            $this->db->query('UPDATE todos SET todo = :todo WHERE id = :id');
            $this->db->bind(':todo', $data['todo']);
            $this->db->bind(':id', $data['id']);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }