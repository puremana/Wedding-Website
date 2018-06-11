<?php
    //Connect to the database PHP file
    include 'includes/db.php';
    
    //Query for all users
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    $html = "";
    //Read from database
    while($row = mysqli_fetch_assoc($result)) {
        $name = $row['user_name'];

        $html = $html . "<div class='block'>
            <div class='block-name'>
                " . $name . "
            </div>
            <div class='block-can'>
                <button class='button can'>Can Go</button>
            </div>
            <div class='block-status'>
                Awaiting confirmation
            </div>
            <div class='block-cant'>
            <button class='button cant'>Can't Go</button>
            </div>
        </div>";
    }
    echo $html;