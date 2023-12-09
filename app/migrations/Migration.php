<?php
    require_once '/var/www/html/app/config/config.php';
    require_once '/var/www/html/app/libraries/Database.php';
    class Migration {
        private Database $db;

        public function __construct(Database $database) {
            $this->db = $database;
        }

        public function run(): void {
            //This will create the tables in the database
            if(!$this->checkIfTableExists('users')) {
                $this->createUsersTables();
            } else {
                echo "Users table exists\n";
            }

            if(!$this->checkIfTableExists('todos')) {
                $this->createToDoTables();
            } else {
                echo "Todos table exists\n";
            }
        }

        private function checkIfTableExists(String $tableName): bool {
            $this->db->query("SHOW TABLES LIKE :tableName");
            $this->db->bind(':tableName', $tableName);
            $this->db->execute();
            return $this->db->rowCount() > 0;
        }

        private function createUsersTables(): void {
            try {
                $sql = "CREATE TABLE users (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(255) NOT NULL,
                    email VARCHAR(255) NOT NULL,
                    password VARCHAR(255) NOT NULL
                ) ENGINE=INNODB;";

                $this->db->query($sql);
                $this->db->execute();
                echo "User tables created\n";
            } catch (PDOException $e) {
                // error message
                echo "Error when creating user table: " . $e->getMessage() . "\n";
            }
        }

        private function createToDoTables(): void {
            try {
                // Create the table
                $sql = "CREATE TABLE todos (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    user_id INT NOT NULL,
                    todo TEXT NOT NULL,
                    completed TINYINT(1) DEFAULT 0,
                    FOREIGN KEY (user_id) REFERENCES users(id)
                ) ENGINE=INNODB;";

                $this->db->query($sql);
                $this->db->execute();
                echo "Todos tables created\n";
            } catch (PDOException $e) {
                echo "Error when creating todo table: " . $e->getMessage() . "\n";
            }
        }
    }

    // Check if this is being ran from the CLI and run the migration
    if (php_sapi_name() == 'cli') {
        $db = new Database();
        $migration = new Migration($db);
        $migration->run();
        echo "Migration Completed!";
        echo "\n";
    } else {
        echo "This must be ran from the CLI";
        echo "\n";
    }

