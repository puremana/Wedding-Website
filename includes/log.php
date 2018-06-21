<?php
    function logAction($message) {
        $ip = $_SERVER['REMOTE_ADDR'];
        $tz = 'Pacific/Auckland';
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($tz));
        $dt->setTimestamp($timestamp);
        $date = $dt->format('d.m.Y, H:i:s');

        $dbServerName = "localhost";
        $dbUserName = "root";
        $dbPassword = "";
        $dbName = "wedding";
        $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
        
        $sql = "INSERT INTO `logMessages`(`log_ip`, `log_date`, `log_message`) VALUES ('$ip','$date','$message')";
        mysqli_query($conn, $sql);
    }