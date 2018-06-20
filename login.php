<?php
session_start();

if (isset($_POST['submit'])) {
    
    include 'includes/db.php';

    $pwd = mysqli_real_escape_string($conn, $_POST['userPassword']);

    if (empty($pwd)) {
        header("Location: admin.php");
        exit();
    }
    else {
        //no need $hash = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM `log` WHERE `user_pass` = '$pwd'";
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