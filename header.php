<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ticketoo</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
        
    </head>
    <body>
        
        <nav>
            <a href="index.php"></a>
            <div class = "wrapper">
                <a href="index.php">Home</a>
                <a href="moviesPage.php">Movies</a>
                <?php
                if (isset($_SESSION["useruid"])) {
                    echo "<a href='account.php'>Account</a>";
                    echo "<a href='includes/logout.inc.php'>Log out</a>";
                }
                else {
                    echo "<a href='signup.php'>Sign-up</a>";
                    echo "<a href='login.php'>Login</a>";
                }
                    ?>
                   
                
            </div>
        </nav>

<div class = "wrapper">