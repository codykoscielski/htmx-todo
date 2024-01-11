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
    }