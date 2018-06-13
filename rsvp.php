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
        <link href="css/style.css" rel="stylesheet">

        <!-- Javascript -->
        <script src="script.js"></script>

        <title>RSVP - Olly and Monique</title>
    
    </head>
    <body onload="getUserInfo()" class="page-rsvp">
        <div class="header">
            <h2>RSVP</h2>
        </div>
        <div class="content">
            <div class="search-container">
                <div class="search-label-container">
                    <label for="search">Enter Full Name</label>
                </div>
                <input class="search" name="search" id="search" placeholder="Enter Full Name" onkeyup="search(this)"></input>
            </div>
            <div class="block-container" id="block-container">
                
            </div>
        </div>
    </body>
</html>