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

        <title>RSVP - Oliver and Monique</title>

    </head>
    <body onload="getUserInfo()">
        <div class="header">
            <h2>Oliver &#38; Monique</h2>
            <h1>Wedding</h1>
        </div>
        <div class="content">
            <div class="search-container">
                <label for="search">Enter Full Name</label>
                <input class="search" name="search" id="search" placeholder="Enter Full Name" onkeyup="search(this)"></input>
            </div>
            <div class="block-container" id="block-container">
                <div class="block">
                    <div class="block-name">
                        Nelson Shaw
                    </div>
                    <div class="block-can">
                        <button class="button can">Can Go</button>
                    </div>
                    <div class="block-status">
                        Awaiting confirmation
                    </div>
                    <div class="block-cant">
                    <button class="button cant">Can't Go</button>
                    </div>
                </div>
                <div class="block">
                    <div class="block-name">
                        Nelson Shaw
                    </div>
                    <div class="block-can">
                        <button class="button can">Can Go</button>
                    </div>
                    <div class="block-status">
                        Awaiting confirmation
                    </div>
                    <div class="block-cant">
                    <button class="button cant">Can't Go</button>
                    </div>
                </div>
                <div class="block">
                    <div class="block-name">
                        Nelson Shaw
                    </div>
                    <div class="block-can">
                        <button class="button can">Can Go</button>
                    </div>
                    <div class="block-status">
                        Awaiting confirmation
                    </div>
                    <div class="block-cant">
                    <button class="button cant">Can't Go</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>