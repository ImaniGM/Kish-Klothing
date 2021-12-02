<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta char set="UTF-8">
        <meta name="viewport" content="width=devicewidth, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script type="text/javascript" src="/js/owner.js"></script>
        <link type="text/css" rel="stylesheet" href="/css/login.css">
        <title>Kish Klothing</title>
    </head>
    <body>
        <header>
            <h1>Owner</h1>
            <h2>Logged In by User: <?= $_SESSION['username']." With Username: ".strval($_SESSION['usern'])?></h2>
        </header>
        <main>
            <div class="container">
                <button type="submit" id="addCust">Add Customer</button>
                <button type="submit" id="viewCust">Search Customer</button>
                <button type="submit" id="editCust">Edit Customer</button>
                <button type="submit" id="addMat">Add Material</button>
                <button type="submit" id="editMat">Change Material Quantity</button>
                <button type="submit" id="serStatus">Service Status</button>
                <div id="system"></div>
                <button type="submit" id="log-out">Log Out</button>
            </div>
        </main>
    </body>
</html>