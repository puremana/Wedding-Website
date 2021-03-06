<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="theme-color" content="#000000">
        <meta name="author" content="Jeremy">
        <meta name="description" content="Oliver and Monique wedding website, admin page">

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon/favicon.ico">
        <link rel="icon" sizes="16x16 32x32 64x64" href="favicon/favicon.ico">
        <link rel="icon" type="image/png" sizes="196x196" href="favicon/favicon-192.png">
        <link rel="icon" type="image/png" sizes="160x160" href="favicon/favicon-160.png">
        <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96.png">
        <link rel="icon" type="image/png" sizes="64x64" href="favicon/favicon-64.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16.png">
        <link rel="apple-touch-icon" href="favicon/favicon-57.png">
        <link rel="apple-touch-icon" sizes="114x114" href="favicon/favicon-114.png">
        <link rel="apple-touch-icon" sizes="72x72" href="favicon/favicon-72.png">
        <link rel="apple-touch-icon" sizes="144x144" href="favicon/favicon-144.png">
        <link rel="apple-touch-icon" sizes="60x60" href="favicon/favicon-60.png">
        <link rel="apple-touch-icon" sizes="120x120" href="favicon/favicon-120.png">
        <link rel="apple-touch-icon" sizes="76x76" href="favicon/favicon-76.png">
        <link rel="apple-touch-icon" sizes="152x152" href="favicon/favicon-152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="favicon/favicon-180.png">
        <meta name="msapplication-TileColor" content="#FFFFFF">
        <meta name="msapplication-TileImage" content="favicon/favicon-144.png">
        <meta name="msapplication-config" content="favicon/browserconfig.xml">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Montserrat:Montserrat:400,400i,600" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/admin-style.css" rel="stylesheet">

        <!-- Javascript -->
        <script src="script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>

        <title>Admin - Olly and Monique</title>
    
    </head>
    <body class="page-admin">
        <?php
            session_start();
            if (isset($_SESSION['user_id'])) {
                include 'includes/db.php';

                //General Table
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);
                $generalTable = "<table class='general-table'>
                <tr>
                    <th>ID</th>
                    <th>Name</th> 
                    <th>Status</th>
                    <th>Bus</th>
                </tr>";

                $statusAwaiting = 0;
                $statusGoing = 0;
                $statusUnable = 0;

                $busGoing = 0;
                $busNo = 0;

                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['user_id'];
                    $name = $row['user_name'];
                    $status = $row['user_status'];
                    $bus = $row['user_bus'];

                    if ($status == null) {
                        $statusText = "<span class='yellow'>Awaiting Confirmation</span>";
                        $statusAwaiting++;
                    }
                    else if ($status == "going") {
                        $statusText = "<span class='green'>Going</span>";
                        $statusGoing++;
                    }
                    else {
                        $statusText = "<span class='red'>Unable to attend</span>";
                        $statusUnable++;
                    }

                    if ($bus == "true") {
                        $busText = "<span class='green'>true</span>";
                        $busGoing++;
                    } 
                    else {
                        $busText = "<span class='red'>false</span>";
                        $busNo++;
                    }

                    $button = "<button class='button-delete' onclick='deleteUser(" . $id . ", \"" . $name . "\")'>Delete</button>";

                    $generalTable = $generalTable . "<tr>
                        <td>" . $id . "</td>
                        <td>" . $name . "</td>
                        <td>" . $statusText . "</td>
                        <td>" . $busText . "</td>
                        <td>" . $button . "</td>
                    </tr>"; 
                }
                $generalTable = $generalTable . "</table>";

                //Log Table
                $sql = "SELECT * FROM logMessages ORDER BY log_id DESC;";
                $result = mysqli_query($conn, $sql);
                $logTable = "<table class='general-table'>
                <tr>
                    <th>IP Address</th> 
                    <th>Time</th>
                    <th>Message</th>
                </tr>";

                while($row = mysqli_fetch_assoc($result)) {
                    $ip = $row['log_ip'];
                    $date = $row['log_date'];
                    $message = $row['log_message'];

                    $logTable = $logTable . "<tr>
                        <td>" . $ip . "</td>
                        <td>" . $date . "</td>
                        <td>" . $message . "</td>
                    </tr>"; 
                }
                $logTable = $logTable . "</table>";

                echo '        
                <div class="header-container">
                    <h2>Admin Dashboard</h2>
                </div>
                <div class="admin-content">
                <h3>Manual Input Person</h3>
                <form class="input-form" action="inputPerson.php" method="post">
                    <div class="form-input">
                        <span class="bold">Full Name</span>
                        <input type="text" placeholder="Full Name" name="name">
                    </div>
                    <div class="form-input">
                        <span class="bold">Set Attendance</span>
                        <select name="attendance">
                            <option value="awaiting">Awaiting</option>
                            <option value="unable">Unable</option>
                            <option value="going">Going</option>
                        </select>
                    </div>
                    <div class="form-input">
                        <span class="bold">Bus</span>
                        <select name="bus">
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                    </div>
                    <button type="submit" name="submitUser">Submit</button>
                </form>
                    <h3>Overall Info</h3>
                ' . '
                <div class="chart-container">
                    <canvas id="attendChart" width="400" height="400"></canvas>
                </div>
                <div class="chart-container">
                    <canvas id="busChart" width="400" height="400"></canvas>
                </div>
    <script>
    var ctx = document.getElementById("attendChart").getContext("2d");
    var attendChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: ["Unable to Attend", "Going", "Awaiting Confirmation"],
            datasets: [{
                label: "# of Votes",
                data: [' . $statusUnable . ', ' . $statusGoing . ', ' . $statusAwaiting . '],
                backgroundColor: [
                    "rgba(255, 99, 132, 0.2)",
                    "rgba(54, 162, 235, 0.2)",
                    "rgba(255, 206, 86, 0.2)"
                ],
                borderColor: [
                    "rgba(255,99,132,1)",
                    "rgba(54, 162, 235, 1)",
                    "rgba(255, 206, 86, 1)"
                ],
                borderWidth: 1
            }]
        },
        options: {
            title: {
                display: true,
                text: "Member Status"
            }
        }
    });
    var ctx2 = document.getElementById("busChart").getContext("2d");
    var busChart = new Chart(ctx2, {
        type: "pie",
        data: {
            labels: ["Not Attending Bus", "Attending Bus"],
            datasets: [{
                label: "# of Votes",
                data: [' . $busNo . ', ' . $busGoing . '],
                backgroundColor: [
                    "rgba(255, 99, 132, 0.2)",
                    "rgba(54, 162, 235, 0.2)"
                ],
                borderColor: [
                    "rgba(255,99,132,1)",
                    "rgba(54, 162, 235, 1)"
                ],
                borderWidth: 1
            }]
        },
        options: {
            title: {
                display: true,
                text: "Bus Attendance"
            }
        }
    });
    </script>
                ' . '
        
                    <h3>All Info</h3>
                    ' . $generalTable . '
                    <h3>Log Information</h3>
                    ' . $logTable . '
                </div>';
            }
            else {
                echo '
                <div class="login-form">
                    <h4>Password</h4>
                    <form action="login.php" method="post">
                            <input id="userPassword" name="userPassword" type="password" placeholder="Enter Password here">
                            <button id="userLogin" name="submit" type="submit">Login</button>
                    </form>
                </div>';
            }
        ?>

        

    </body>
</html>