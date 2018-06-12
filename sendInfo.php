<?php
    //Connect to the database PHP file
    include 'includes/db.php';

    //Get the parameters that were sent using the javascript function
    $details = $_GET['text'];
	$array = explode(',', $details);
	
	$status = $array[0];
    $id = $array[1];
    
    //Insert new status into database
    if ($status == "going") {
        $sql = "UPDATE users SET user_status = 'going' WHERE user_id = " . $id . ";";
        mysqli_query($conn, $sql);
    }
    else {
        $sql = "UPDATE users SET user_status = 'unable' WHERE user_id = " . $id . ";";
        mysqli_query($conn, $sql);
    }
    echo $id;