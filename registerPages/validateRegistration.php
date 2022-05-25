<?php

    include('connection.php');

    $Email = $_POST['email'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $pass = hash('sha256', $pass);

    $Role = $_POST['Role'];

    //prepared statement
    $sqlQueryForm = "INSERT INTO `user`(`login`, `password`, `email`, `Role`) VALUES (?,?,?,?)";

    $query = mysqli_prepare($con, $sqlQueryForm);
    $query->bind_param("ssss",$user, $pass, $Email, $Role);
    $query->execute();
    

    //Search for inserted user

    $sql = "select *from user where login = ? and password =  ? "; 

    $stmnt = mysqli_prepare($con, $sql);
    $stmnt->bind_param("ss",$username, $password);
    $stmnt->execute();
    
    $result = $stmnt->get_result();  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
    
    if($count == 1){  
        
    }  
    else{  
    }     
    
?>