<?php
session_start();

if (isset($_POST['submitUser'])) {
    
    include 'includes/db.php';

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $attendance = mysqli_real_escape_string($conn, $_POST['attendance']);
    $bus = 'false';
    if ($_POST['bus'] == "yes") {
        $bus = 'true';
    }
    if ($attendance == "awaiting") {
        $attendance = null;
    }

    if (empty($name)) {
        header("Location: admin.php");
        exit();
    }
    else {
        echo $name;
        echo $attendance;
        echo $bus;
        $sql = "INSERT INTO `users`(`user_name`, `user_status`, `user_bus`) VALUES ('$name','$attendance','$bus')";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
            header("Location: admin.php");
            exit();
        }
        else {
            $_SESSION["user_id"] = "use_row_id_if_real";
            header("Location: admin.php");
            exit;
        }
    }
}
?>