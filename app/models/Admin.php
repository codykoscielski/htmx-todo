<?php

    class Admin {

        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function registerNewUser($data): bool {
            $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');

            // Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);

            // Execute the insert statement
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }