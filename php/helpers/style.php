<?php

    function getStatusStyle($status){
        
        $style = "";
        
        switch($status){
            case "In-Progress":
                $style = 'style="color:#4169E1;"';
                break;
            case "Done":
                $style = 'style="color:#3CB371;"';
                break;
            case "OverDue":
                $style = 'style="color:#FF4500;"';
                break;
            default:
                $style = 'style="color:black;"';
                break;
        }

        return $style;
    }

?>