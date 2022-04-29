<?php

    include 'db.php';

    class ToDo extends Database{

        function __construct()
        {
            // This class uses the parameters defined in db_config.php.
            // You should not use setters to alter this class's attributes.
            Database::__construct();
        }

        function getAllUserTasks($username){
            $id = $this->grabQueryResults("SELECT * FROM Users WHERE UserName='{$username}'");
            $id = $id->fetch_assoc()["uID"];
            return $this->grabQueryResults(
                "SELECT " . 
                "u.UserName, " .
                "t.Title, " . 
                "t.Description, " .
                "t.Status, " . 
                "t.EntryDate, ". 
                "t.DueDate " .
                "FROM Users u INNER JOIN Tasks t ON t.AccountID='{$id}'"
            );
        }

        function getAllUsers(){
            $sql = "SELECT * FROM Users";
            return $this->grabQueryResults($sql);
        }

        function getAllTasks(){
            $sql = "SELECT * FROM Tasks";
            return $this->grabQueryResults($sql);
        }

        function isUserInDB($username){
            $sql = "SELECT * FROM Users WHERE UserName='{$username}'";
            return mysqli_num_rows($this->grabQueryResults($sql)) > 0;
        }

        function doAccountDetailsMatch($username, $password){
            $sql = "SELECT * FROM Users WHERE UserName='{$username}' AND Password='{$password}'";
            return mysqli_num_rows($this->grabQueryResults($sql)) > 0;
        }

    } 

    $todoDB = new ToDo();

?>