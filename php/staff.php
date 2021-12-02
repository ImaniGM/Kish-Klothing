<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link type="text/css" rel="stylesheet" href="/css/staff.css">
        
        <script type="text/javascript" src="/js/staff.js"></script>
        <title>Kish Klothing</title>
    </head>
    <body>
        <header>
            <h1>Kish Klothing Staff Portal</h1>
            <div class="profile">
                    <h3>Username: <?= $_SESSION['username']?></h3>
            </div>
            <div class="container">
                <button type="submit" id="log-out">Log Out</button>
            </div>
        </header>
        <main>
            <div class="main-content">
                <div class="customers"></div>
            </div>
        </main>
        <footer>  
        </footer>
    </body>
</html>