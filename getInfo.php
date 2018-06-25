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
        $bus = $row['user_bus'];

        $statusText = "";
        $busText = "";

        if ($status == null) {
            $statusText = "<span class='status grey'>Awaiting confirmation</span>";
        }
        else if ($status == "going") {
            $statusText = "<span class='status green'>Attending</span>";
        }
        else {
            $statusText = "<span class='status red'>Unable to attend</span>";
        }

        if ($bus == "true") {
            $busText = "<input type='checkbox' class='checkbox-bus' checked name='bus' value='" . $id . "' onclick='busCheck(this)'>Require seat on bus";
        } 
        else {
            $busText = "<input type='checkbox' class='checkbox-bus' name='bus' value='" . $id . "' onclick='busCheck(this)'>Require seat on bus";
        }

        $html = $html . "<div class='block hide' id='block-" . $id . "'>
            <div class='block-upper'>
                <div class='block-name'>
                    <p class='name'>" . $name . "</p>
                    <p>" . $statusText . " </p>
                </div>
                <div class='block-can'>
                    <div class='button can' onclick='going(" . $id . ")'>Attending</div>
                </div>
            </div>
            <div class='block-lower'>
                <div class='block-status'>
                    " . $busText . "
                </div>
                <div class='block-cant'>
                    <div class='button cant' onclick='unable(" . $id . ")'>Can't go</div>
                </div>
            </div>
        </div>";
    }
    echo $html;