<?php session_start(); 
    if(!isset($_SESSION['Username']))
    {
        header('Location:index.php');
    }
    
?>
<!DOCTYPE html>
<html>
<div id="body">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
        <link rel = "stylesheet" type = "text/css" href = "style.css">   
        
        <title >Main Page</title>

        <!--title icon-->
        <link rel="icon" href="photos/icsdlogo.png" type="image/icon type">
    </head>
    <body>
        <div class="nav navbar-expand-md navbar-expand-lg topnav">
            <a id="navimg" href="MainPage.php"><img width="25%" src="photos/icsdlogo.png"></a>
            <div class="text-center"><?php echo 'welcome <br>' . $_SESSION['Username'] ?></div>
            
            <!-- The navigation buttons -->
            
        
        </div>
    </body>
</div>
</html>