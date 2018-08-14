<?php
    //Connect to the database PHP file
    include 'includes/db.php';
    include 'includes/log.php';

    //Get the parameters that were sent using the javascript function
    $details = $_GET['text'];
	$array = explode(',', $details);
	
	$type = mysqli_real_escape_string($conn, $array[0]);
    $id = mysqli_real_escape_string($conn, $array[1]);
    
    if ($type === "going" || $type === "unable") {
        $stmt = $conn->prepare("UPDATE users SET user_status = ? WHERE user_id = ?");
        $stmt->bind_param('si', $type, $id);
        if ($stmt->execute()) {
            logAction("User ID: " . $id . " has had their user_status changed to " . $type . ".");
        }
    }
    else {
        $stmt = $conn->prepare("UPDATE users SET user_bus = ? WHERE user_id = ?");
        $stmt->bind_param('si', $typeBus, $id);

        $typeBus = ($type === "busYes") ? "true" : "false";

        if ($stmt->execute()) {
            logAction("User ID: " . $id . " has had their user_bus changed to " . $typeBus . ".");
        }
    }

    $stmt->close();
    $conn->close();

    echo $id;