<?php

    require_once(__DIR__ . "/../config/lib.php");

    $tID = $_GET["tID"];

    $todoDB->connect();

    if($todoDB->getConnection()){

        try{

            $query = $todoDB->getTask($tID);
            
            $row = mysqli_fetch_assoc($query);

            $task = new Task();
            $task->tID = $row["tID"];
            $task->title = $row["Title"];
            $task->description = $row["Description"];
            $task->status = $row["Status"];
            $task->entryDate = $row["EntryDate"];
            $task->dueDate = $row["DueDate"];

            echo json_encode($task);

        }
        catch(Exception $e){
            echo "ERROR: Failed to retrieve your task!";
        }

    }   
    else{
        echo "ERROR: Failed to connect to database!";
    }

    $todoDB->close();

?>