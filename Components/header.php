<?php 
    require 'sessionStart.php';

    if(!isset($_SESSION['Username']))
    {
        header('Location: http://localhost');
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" 
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
        
        <link rel = "stylesheet" type = "text/css" href = "style.css">   
        
        <title><?php echo basename($_SERVER['PHP_SELF'],'.php') ; ?></title>
        
        <!--title icon-->
        <link rel="icon" href="photos/icsdlogo.png" type="image/icon type">
    </head>
    <body>
    <div id="body" class="">
        <nav class="nav navbar-collapse navbar-expand-md topnav">
            <a id="navimg" class="navbar-brand" href="MainPage.php"><img width="25%" src="photos/icsdlogo.png"></a>
            <div class="text-center collapse navbar-collapse"><?php echo "<div style='color: black; font-weight: 600'>welcome: " . $_SESSION['Role'] . '<br>' . $_SESSION['Username'] . "</div>" ?></div>
            <div class="text-center collapse navbar-collapse justify-content-end">
                <a href="Courses.php" class="btn buttonText">Courses</a>
                <a href="logout.php" class="btn buttonText">logout</a>
            </div>
            <!-- The navigation buttons -->
            

        </nav>