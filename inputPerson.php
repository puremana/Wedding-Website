<?php
session_start();

if (isset($_POST['submitUser'])) {
    
    include 'includes/db.php';

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $attendance = mysqli_real_escape_string($conn, $_POST['attendance']);
    $bus = 'false';
    if ($_POST['bus'] === "yes") {
        $bus = 'true';
    }
    if ($attendance === "awaiting") {
        $attendance = null;
    }

    if (empty($name)) {
        header("Location: admin.php");
        exit();
    }
    else {
        $stmt = $conn->prepare("INSERT INTO `users`(`user_name`, `user_status`, `user_bus`) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $attendance, $bus);

        $stmt->execute();

        $stmt->close();
        $conn->close();

        header("Location: admin.php");
    }
}
?>