<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="theme-color" content="#000000">
        <meta name="author" content="Jeremy">
        <meta name="description" content="Oliver and Monique wedding website">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Montserrat:Montserrat:400,400i,600" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/admin-style.css" rel="stylesheet">

        <title>Admin - Olly and Monique</title>
    
    </head>
    <body class="page-admin">
        <?php
            session_start();
            if (isset($_SESSION['user_id'])) {
                echo '
                <div class="header-container">
                    <h2>Admin Dashboard</h2>
                </div>
                <div class="admin-content">
                    <h3>Overall Info</h3>
        
        
                    <h3>All Info</h3>
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