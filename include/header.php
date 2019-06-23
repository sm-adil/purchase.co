<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="./assets/favicon.ico">
    <title>Purchase.co</title>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="nav-items">
                <a href="index.php" class="brand">Purchase.co</a href="index.php">
                <ul>
                    <li><a href='cart.php'>Cart</a></li>

                    <!-- Displaying routes depending upon the user session -->
                    <?php
                        if (isset($_SESSION['username'])):
                    ?>
                        <li><a href='dashboard.php'>Dashboard</a></li>
                        <li><a href='logout.php'>Log Out</a></li>
                    <?php else: ?>
                        <li><a href='register.php'>Sign In</a></li>
                        <li><a href='login.php'>Log In</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </header>
    
    