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

        public function delete($id) {
            $this->db->query();
        }
    }