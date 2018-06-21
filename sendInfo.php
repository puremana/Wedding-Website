<?php
    //Connect to the database PHP file
    include 'includes/db.php';
    include 'includes/log.php';

    //Get the parameters that were sent using the javascript function
    $details = $_GET['text'];
	$array = explode(',', $details);
	
	$type = $array[0];
    $id = $array[1];
    
    //Insert new info into database
    if ($type == "going") {
        $sql = "UPDATE users SET user_status = 'going' WHERE user_id = " . $id . ";";
        mysqli_query($conn, $sql);
        logAction("User ID: " . $id . " has had their user_status changed to going.");
    }
    else if ($type == "unable") {
        $sql = "UPDATE users SET user_status = 'unable' WHERE user_id = " . $id . ";";
        mysqli_query($conn, $sql);
        logAction("User ID: " . $id . " has had their user_status changed to unable.");
    }
    else if ($type == "busYes") {
        $sql = "UPDATE users SET user_bus = 'true' WHERE user_id = " . $id . ";";
        mysqli_query($conn, $sql);
        logAction("User ID: " . $id . " has had their user_bus changed to true.");
    }
    else if ($type == "busNo") {
        $sql = "UPDATE users SET user_bus = 'false' WHERE user_id = " . $id . ";";
        mysqli_query($conn, $sql);
        logAction("User ID: " . $id . " has had their user_bus changed to false.");
    }
    echo $id;