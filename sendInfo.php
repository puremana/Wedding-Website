<?php
    //Connect to the database PHP file
    include 'includes/db.php';

    //Get the parameters that were sent using the javascript function
    $details = $_GET['text'];
	$array = explode(',', $details);
	
	$type = $array[0];
    $id = $array[1];
    
    //Insert new info into database
    if ($type == "going") {
        $sql = "UPDATE users SET user_status = 'going' WHERE user_id = " . $id . ";";
        mysqli_query($conn, $sql);
    }
    else if ($type == "unable") {
        $sql = "UPDATE users SET user_status = 'unable' WHERE user_id = " . $id . ";";
        mysqli_query($conn, $sql);
    }
    else if ($type == "busYes") {
        $sql = "UPDATE users SET user_bus = 'true' WHERE user_id = " . $id . ";";
        mysqli_query($conn, $sql);
    }
    else if ($type == "busNo") {
        $sql = "UPDATE users SET user_bus = 'false' WHERE user_id = " . $id . ";";
        mysqli_query($conn, $sql);
    }
    echo $id;