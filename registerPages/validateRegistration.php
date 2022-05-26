<?php

    include('../connection.php');

    $Email = $_POST['email'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $pass = hash('sha256', $pass);  //hashes the password first

    $Role = $_POST['Role'];

    $ErrorMessage = "";
    if(UsernameExists($con, $user)){
        $ErrorMessage .= "Username already exists. ";
    }
    elseif(EmailExists($con, $Email)){
        $ErrorMessage .= "Email already exists. ";
    }
    
    if($ErrorMessage != ""){ postRegisterFailiure($ErrorMessage, "RegisterForm.php"); exit;}


    //prepared statement
    $sqlQueryForm = "INSERT INTO `user`(`login`, `password`, `email`, `Role`) VALUES (?,?,?,?)";

    $query = mysqli_prepare($con, $sqlQueryForm);
    $query->bind_param("ssss",$user, $pass, $Email, $Role);
    
    if($query->execute()){  
        postRegisterFailiure("Successfully registered", "../index.php");
        exit;
    }  
    else{  
        postRegisterFailiure("Uknown failure: " . $result, "RegisterForm.php");
        exit;
    }     
    

    function UsernameExists($con, $username){
        //prepared statement
        $sqlQueryForm = "select *from user where login = ?";

        $query = mysqli_prepare($con, $sqlQueryForm);
        $query->bind_param("s",$username);
        $query->execute();

        $result = $query->get_result();
        if(mysqli_num_rows($result)>=1){
            return true;            
        }
    }

    function EmailExists($con, $email){
        $sqlQueryForm = "select *from user where email = ?";
        $query = mysqli_prepare($con, $sqlQueryForm);
        $query->bind_param("s",$email);
        $query->execute();

        $result = $query->get_result();
        if(mysqli_num_rows($result)>=1){
            return true;            
        }
    }

    function postRegisterFailiure($message, $to){
        ?>
        <form action="<?php echo $to; ?>" method="POST" id="FailForm">

            <input type="hidden" name="register" value="<?php echo $message;?>" />
            <input type="submit" />
        </form>
        <script> document.getElementById("FailForm").submit(); </script>
        <?php
    }
?>