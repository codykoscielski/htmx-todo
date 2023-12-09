<?php

    /*
     * PDO Database class
     * Connect to the database
     * create prepared statements
     * bind values
     * return rows and results
     */

    #[AllowDynamicProperties] class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;
        //The database handler when creating a prepared statement
        private $dbh;
        //The statement
        private $stmt;
        private $error;

        function __construct(){
            //Set DSN
            $dsn = 'mysql:host=' . $this->host . ';port=32780;dbname=' . $this->dbname;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            //Create new PDO
            try {
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        //Prepare statement with query
        public function query($sql) {
            $this->stmt = $this->dbh->prepare($sql);
        }

        //Bind Values
        public function bind($param, $value, $type = null) {
            if(is_null($type)) {
                switch(true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }

        //Execute the prepared statment
        public function execute() {
            return $this->stmt->execute();
        }

        //Get results set as array of objects
        public function resultSet() {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }
        //Get a single record as an object
        public function single() {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        //Get the row count
        public function rowCount() {
            return $this->stmt->rowCount();
        }
    }