<?php
session_start();

if (isset($_POST['submit'])) {
    
    include 'includes/db.php';

    $pwd = mysqli_real_escape_string($conn, $_POST['userPassword']);

    if (empty($pwd)) {
        header("Location: admin");
        exit();
    }
    else {
        //no need $hash = password_hash($pwd, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("SELECT `user_id` FROM `log` WHERE `user_pass` = ?");
        $stmt->bind_param('s', $pwd);

        $stmt->execute();

        $stmt->bind_result($user_id);
        $stmt->store_result();

        if($stmt->num_rows >= 1) {
            if ($stmt->fetch()) {
                $_SESSION["user_id"] = $user_id;
                header("Location: admin");
            }
        } 
        else {
            header("Location: admin");
        }

        $stmt->close();
        $conn->close();
    }
}
?>