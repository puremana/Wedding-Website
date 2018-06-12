<?php
    //Connect to the database PHP file
    include 'includes/db.php';
    
    //Query for all users
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    $html = "";
    //Read from database
    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['user_id'];
        $name = $row['user_name'];
        $status = $row['user_status'];
        $statusText = "";

        if ($status == null) {
            $statusText = "<span class='grey'>Awaiting confrmation</span>";
        }
        else if ($status == "going") {
            $statusText = "<span class='green'>Going</span>";
        }
        else {
            $statusText = "<span class='red'>Unable to attend</span>";
        }

        $html = $html . "<div class='block hide' id='block-" . $id . "'>
            <div class='block-upper'>
                <div class='block-name'>
                    <p class='name'>" . $name . "</p>
                    <p>" . $statusText . " </p>
                </div>
                <div class='block-can'>
                    <div class='button can' onclick='going(" . $id . ")'>Going</div>
                </div>
            </div>
            <div class='block-lower'>
                <div class='block-status'>
                    
                </div>
                <div class='block-cant'>
                    <div class='button cant' onclick='unable(" . $id . ")'>Unable</div>
                </div>
            </div>
        </div>";
    }
    echo $html;