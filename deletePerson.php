<?php
    include 'includes/db.php';

    $id = $_GET['text'];
    
    $sql = "DELETE FROM `users` WHERE `user_id` = '$id'";
    $result = mysqli_query($conn, $sql);
?>