<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="theme-color" content="#000000">
        <meta name="author" content="Jeremy">
        <meta name="description" content="Oliver and Monique wedding website, RSVP">

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
        <link href="css/style.css" rel="stylesheet">

        <!-- Javascript -->
        <script src="script.js"></script>

        <title>RSVP - Olly and Monique</title>
    
    </head>
    <body onload="getUserInfo()" class="page-rsvp">
        <div class="sk-fading-circle" id="loader">
            <div class="sk-circle1 sk-circle"></div>
            <div class="sk-circle2 sk-circle"></div>
            <div class="sk-circle3 sk-circle"></div>
            <div class="sk-circle4 sk-circle"></div>
            <div class="sk-circle5 sk-circle"></div>
            <div class="sk-circle6 sk-circle"></div>
            <div class="sk-circle7 sk-circle"></div>
            <div class="sk-circle8 sk-circle"></div>
            <div class="sk-circle9 sk-circle"></div>
            <div class="sk-circle10 sk-circle"></div>
            <div class="sk-circle11 sk-circle"></div>
            <div class="sk-circle12 sk-circle"></div>
        </div>
        <div class="nav">
            <ul>
                <a href="/"><li>Home</li></a>
                <a href="/event-info"><li><span class="mobile-display">Event </span>Info</li></a>
                <a href="/rsvp"><li>RSVP</li></a>
                <a href="/gallery"><li class="last">Gallery</li></a>
            </ul>
        </div>
        <div class="header">
            <h2>RSVP</h2>
        </div>
        <div class="content">
            <div class="search-container">
                <div class="search-label-container">
                    <label for="search">Enter Full Name</label>
                </div>
                <input class="search" name="search" id="search" placeholder="Enter Full Name" onkeyup="search(this)" disabled></input>
            </div>
            <div class="block-container" id="block-container">
                
            </div>
        </div>
    </body>
</html>