<?php
    include 'includes/db.php';

    $id = mysqli_real_escape_string($conn, $_GET['text']);
    
    $stmt = $conn->prepare("DELETE FROM `users` WHERE `user_id` = ?");
    $bind = $stmt->bind_param('i', $id);

    if ($bind === false) {
        exit();
    }

    $stmt->execute();

    $stmt->close();

    $mysqli->close();

    $conn->close();
?>