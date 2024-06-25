<?php
session_start();
include ('./conn/conn.php');

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $userID = $_SESSION['user_id'];

    // Fetch the user's name from the database
    $sql = "SELECT `first_name`, `last_name` FROM `tbl_user` WHERE `tbl_user_id` = '$userID'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $firstName = $row['first_name'];
        $lastName = $row['last_name'];
    }

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FitTrack Pro</title>

        <!-- Style CSS -->
        <link rel="stylesheet" href="./assets/style.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

        <style>
            body {
                overflow: hidden;
            }
        </style>
    </head>
    <body>


        
        <div class="main">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand ml-3" href="#">Welcome to FitTrack Pro App</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="./endpoint/logout.php">Log Out</a>
                    </li>
                </div>
                
            </nav>

            <div class="landing-page-container">
                <div class="heading-container">
                    <h2>Hello My Dear <?= $firstName ?> <?= $lastName?></h2>
                    <p>Do you like coffee? Customize your workout now.</p>
                </div>

                <div class="select-option">
                    <div class="read-journal" onclick="redirectToReadJournal()">
                        <img src="./assets/pic.png" alt="">
                        <p>Your workout list.</p>
                    </div>
                    <div class="write-journal" onclick="redirectToWriteJournal()">
                        <img src="./assets/workout1.jpg" alt="">
                        <p>List your future workouts.</p>
                    </div>
                </div>
            </div>
 
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
        
        <!-- Script JS -->
        <script src="./assets/script.js"></script>
    </body>
    </html>

    <?php

    } else {
        header("Location: http://localhost/workout-journal/index.php");
    }

?>