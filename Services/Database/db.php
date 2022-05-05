<?php

    include 'db_config.php';

    class Database{

        protected $_server;
        protected $_username;
        protected $_password;
        protected $_database;
        protected $_conn;

        function __construct()
        {
            GLOBAL $server;
            GLOBAL $username;
            GLOBAL $password;
            GLOBAL $database;

            // There is no constructor overloading in PHP alter these variables
            // using setters prior to establishing connection or it'll use
            // the db_config parameters. 
            $this->_server = $server;
            $this->_username = $username;
            $this->_password = $password;
            $this->_database = $database;
        }

        public function getServerName(){
            return $this->_server;
        }

        public function setServerName($server){
            $this->_server = $server;
        }

        public function getUsername(){
            return $this->_username;
        }

        public function setUsername($username){
            $this->_username = $username;
        }

        public function getPassword(){
            return $this->_password;
        }

        public function setPassword($password){
            $this->_password = $password;
        }

        public function getDatabaseName(){
            return $this->_database;
        }

        public function setDatabaseName($database){
            $this->_database = $database;
        }

        public function getConnection(){
            return $this->_conn;
        }

        public function connect(){
            $this->_conn = new mysqli($this->_server, $this->_username, $this->_password, $this->_database);
            echo (!$this->_conn) ? die("Connection to DB failed!") : '<script>console.log("Connected to DB!")</script>';
        }

        // Use this function to directly affect database.
        public function executeQuery($sql){
            $queryResult = $this->_conn->query($sql);
            $queryResponse = ($queryResult) ? "SQL Query: Executed!!!" : "Error: {$this->_conn->error}";
            echo '<script>console.log("' . $queryResponse . '");</script>';
            return $queryResult;
        }

        // Obtaining data through SELECT statements
        // This function returns all the rows associated to the SELECT statement.
        // Use "fetch_assoc" method to grab each row at a time.
        public function grabQueryResults($sql){
            return $this->_conn->query($sql);
        }

        // Closes connection to database
        public function close(){
            mysqli_close($this->_conn);
        }

    }

?>