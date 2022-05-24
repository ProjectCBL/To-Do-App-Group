<?php

    class ToDo extends Database{

        function __construct()
        {
            // This class uses the parameters defined in db_config.php.
            // You should not use setters to alter this class's attributes.
            Database::__construct();
        }

        function getAllUserTasks($userName){
            $id = $this->getUserId($userName);
            return $this->grabQueryResults(
                "SELECT " . 
                "tID," .
                "Title, " . 
                "Description, " .
                "Status, " . 
                "EntryDate, ". 
                "DueDate " .
                "FROM Tasks WHERE AccountID='{$id}'"
            );
        }

        function getAllIncompleteUserTasks($userName){
            $id = $this->getUserId($userName);
            return $this->grabQueryResults(
                "SELECT " . 
                "tID," .
                "Title, " . 
                "Description, " .
                "Status, " . 
                "EntryDate, ". 
                "DueDate " .
                "FROM Tasks WHERE AccountID='{$id}' AND status != 'Done'"
            );
        }

        function getAllCompleteUserTasks($userName){
            $id = $this->getUserId($userName);
            return $this->grabQueryResults(
                "SELECT " . 
                "tID," .
                "Title, " . 
                "Description, " .
                "Status, " . 
                "EntryDate, ". 
                "DueDate " .
                "FROM Tasks WHERE AccountID='{$id}' AND status = 'Done'"
            );
        }

        function getUserId($userName){
            $query = $this->grabQueryResults("SELECT * FROM Users WHERE UserName='{$userName}'");
            $id = $query->fetch_assoc()["uID"];
            return $id;
        }

        function getTask($taskId){
            return $this->grabQueryResults("SELECT * FROM Tasks WHERE tID='{$taskId}'");
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

        function insertPreppedNewUser($userName, $password, $email, $firstName, $lastName){
            $sql = "INSERT Users(UserName, Password, Email, FirstName, LastName) VALUES(?,?,?,?,?)";
            $stmnt = $this->getPreppedQuery($sql);
            $stmnt->bind_param("sssss", $userName, $password, $email, $firstName, $lastName);
            return $stmnt->execute();
        }

        function insertNewTask($title, $description, $accountId, $status, $entryDate, $dueDate){
            $sql = "INSERT Tasks(Title, Description, AccountID, Status, EntryDate, DueDate) VALUES(
                '{$title}',
                '{$description}',
                {$accountId},
                '{$status}',
                '{$entryDate}', " . 
                (($dueDate == "null") ? "DEFAULT" : "'{$dueDate}'") .
            ")";
            return $this->executeQuery($sql);
        }

        function insertPreppedNewTask($title, $description, $accountId, $status, $entryDate, $dueDate){
            if($dueDate != "null"){
                return $this->insertPreppedNewTaskWithDueDate($title, $description, $accountId, $status, $entryDate, $dueDate);
            }
            return $this->insertPreppedNewTaskWithNoDueDate($title, $description, $accountId, $status, $entryDate);
        }

        function insertPreppedNewTaskWithDueDate($title, $description, $accountId, $status, $entryDate, $dueDate){
            $sql = "INSERT Tasks(Title, Description, AccountID, Status, EntryDate, DueDate) VALUES(?,?,?,?,?,?)";
            $stmnt = $this->getPreppedQuery($sql);
            $stmnt->bind_param("ssssss", $title, $description, $accountId, $status, $entryDate, $dueDate);
            return $stmnt->execute();
        }

        function insertPreppedNewTaskWithNoDueDate($title, $description, $accountId, $status, $entryDate){
            $sql = "INSERT Tasks(Title, Description, AccountID, Status, EntryDate) VALUES(?,?,?,?,?)";
            $stmnt = $this->getPreppedQuery($sql);
            $stmnt->bind_param("sssss", $title, $description, $accountId, $status, $entryDate);
            return $stmnt->execute();
        }

        function updatePreppedTask($tID, $title, $description, $status, $dueDate){
            if($dueDate != "null"){
                return $this->updatePreppedTaskWithDueDate($tID, $title, $description, $status, $dueDate);
            }
            return $this->updatePreppedTaskWithNoDueDate($tID, $title, $description, $status);
        }

        function updatePreppedTaskWithDueDate($tID, $title, $description, $status, $dueDate){
            $sql = "UPDATE Tasks SET Title=?, Description=?, Status=?, DueDate=? WHERE tID=?";
            $stmnt = $this->getPreppedQuery($sql);
            $stmnt->bind_param("sssss", $title, $description, $status, $dueDate, $tID);
            return $stmnt->execute();
        }

        function updatePreppedTaskWithNoDueDate($tID, $title, $description, $status){
            $sql = "UPDATE Tasks SET Title=?, Description=?, Status=?, DueDate=NULL WHERE tID=?";
            $stmnt = $this->getPreppedQuery($sql);
            $stmnt->bind_param("ssss", $title, $description, $status, $tID);
            return $stmnt->execute();
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
