<?php

    include 'db.php';

    class ToDo extends Database{

        function __construct()
        {
            // This class uses the parameters defined in db_config.php.
            // You should not use setters to alter this class's attributes.
            Database::__construct();
        }

        function getAllUserTasks($userName){
            $id = $this->grabQueryResults("SELECT * FROM Users WHERE UserName='{$userName}'");
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

        function getUserRow($userName){
            $sql = "SELECT * FROM Users WHERE UserName='" . $userName . "'";
            return $this->grabQueryResults($sql)->fetch_assoc();
        }

        function getAllUsers(){
            $sql = "SELECT * FROM Users";
            return $this->grabQueryResults($sql);
        }

        function getAllTasks(){
            $sql = "SELECT * FROM Tasks";
            return $this->grabQueryResults($sql);
        }

        function insertNewUser($userName, $password, $email, $firstName, $lastName){
            $sql = "INSERT Users(UserName, Password, Email, FirstName, LastName) VALUES(
                '{$userName}',
                '{$password}',
                '{$email}',
                '{$firstName}',
                '{$lastName}'
            )";
            return $this->executeQuery($sql);
        }

        function insertNewTask($title, $description, $accountId, $status, $entryDate, $dueDate){
            $sql = "INSERT Tasks(Title, Description, AccountID, Status, EntryDate, DueDate) VALUES(
                '{$title}',
                '{$description}',
                {$accountId},
                '{$status}',
                '{$entryDate}',
                '{$dueDate}'
            )";
            return $this->executeQuery($sql);
        }

        function isUserInDB($userName){
            $sql = "SELECT * FROM Users WHERE UserName='{$userName}'";
            return mysqli_num_rows($this->grabQueryResults($sql)) > 0;
        }

        function doAccountDetailsMatch($userName, $password){
            $sql = "SELECT * FROM Users WHERE UserName='{$userName}' AND Password='{$password}'";
            return mysqli_num_rows($this->grabQueryResults($sql)) > 0;
        }

    } 

    $todoDB = new ToDo();

?>