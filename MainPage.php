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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" 
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
        
        <link rel = "stylesheet" type = "text/css" href = "style.css">   
        
        <title >Main Page</title>

        <!--title icon-->
        <link rel="icon" href="photos/icsdlogo.png" type="image/icon type">
    </head>
    <body>
        <nav class="nav navbar-collapse navbar-expand-md topnav">
            <a id="navimg" class="navbar-brand" href="MainPage.php"><img width="25%" src="photos/icsdlogo.png"></a>
            <div class="text-center collapse navbar-collapse"><?php echo 'welcome ' . $_SESSION['Role'] . '<br>' . $_SESSION['Username'] ?></div>
            
            <!-- The navigation buttons -->
            
        
        </nav>

        <?php
            include('student.php'); 
            $result = getSubjects($_SESSION['Username']);
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                $name = $row['subname'];
                
                echo $name."<br>";
            }
        ?>

    </body>
</div>
</html>