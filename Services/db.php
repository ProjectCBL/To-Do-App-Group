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

        function getServerName(){
            return $this->_server;
        }

        function setServerName($server){
            $this->_server = $server;
        }

        function getUsername(){
            return $this->_username;
        }

        function setUsername($username){
            $this->_username = $username;
        }

        function getPassword(){
            return $this->_password;
        }

        function setPassword($password){
            $this->_password = $password;
        }

        function getDatabaseName(){
            return $this->_database;
        }

        function setDatabaseName($database){
            $this->_database = $database;
        }

        function getConnection(){
            return $this->_conn;
        }

        function connect(){
            $this->_conn = new mysqli($this->_server, $this->_username, $this->_password, $this->_database);
            print((!$this->_conn) ? die("Connection to DB failed!") : "Connected to DB!");
        }

        // Use this function to directly affect database.
        function executeQuery($sql){
            print(($this->_conn->query($sql) == TRUE) ? "SQL Query: \n" . $sql . "\nExecuted!!!" : "Error performing query: " . $this->_conn->error); 
        }

        // Obtaining data through SELECT statements
        function grabQueryResults($sql){
            return $this->_conn->query($sql);
        }

        // Closes connection to database
        function close(){
            mysqli_close($this->_conn);
        }

    }

?>