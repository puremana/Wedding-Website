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
        $status = $row['user_status'];
        $statusText = "";

        if ($status == null) {
            $statusText = "<span class='grey'>Awaiting confrmation</span>";
        }
        else if ($status == "can go") {
            $statusText = "<span class='green'>Going</span>";
        }
        else {
            $statusText = "<span class='red'>Can't Go</span>";
        }

        $html = $html . "<div class='block'>
            <div class='block-upper'>
                <div class='block-name'>
                    <p>" . $name . "</p>
                    <p>" . $statusText . " </p>
                </div>
                <div class='block-can'>
                    <div class='button can'>Can Go</div>
                </div>
            </div>
            <div class='block-lower'>
                <div class='block-status'>
                    
                </div>
                <div class='block-cant'>
                    <div class='button cant'>Can't Go</div>
                </div>
            </div>
        </div>";
    }
    echo $html;