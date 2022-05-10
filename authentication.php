<?php      
    session_start();
    include('connection.php');  
    $username = $_POST['user']; 
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $sql = "select *from user where login = ? and password = PASSWORD( ? )"; 

        $stmnt = mysqli_prepare($con, $sql);
        $stmnt->bind_param("ss",$username, $password);
        $stmnt->execute();
        
        $result = $stmnt->get_result();  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";
            $_SESSION['Username'] = $username;  
            $_SESSION['Role'] = $row['Role'];
            header("Location:MainPage.php");
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
            $_SESSION['login'] = FALSE;
            //sleep(1);
            header("Location:index.php");
        }     
?>  