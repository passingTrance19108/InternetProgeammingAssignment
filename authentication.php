<?php      
    session_start();
    include('Components/connection.php');  

    if(  isset($_POST['submit']) && $_POST['submit']="Continue as Guest")
    {
        $_SESSION['Username'] = uniqid("Guest: ");  
        $_SESSION['Role'] = "Guest";
        header("Location:Courses.php");
        exit;
    }


    $username = $_POST['user']; 
    $password = $_POST['pass'];  
    $password = hash('sha256', $password);


        //search the username and email user is trying to register with and cancel if it does (post failure to RegisterForm)



        //Insert User
        $sql = "select *from user where login = ? and password =  ? "; 

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