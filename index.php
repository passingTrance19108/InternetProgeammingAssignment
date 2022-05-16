<?php session_start(); 

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time();
?>


<!DOCTYPE html>
<html>  
<head>  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <link rel = "stylesheet" type = "text/css" href = "style.css">   

    <title>PHP login system</title>  
	
</head>  
<body>  
<div id="body">
    <div id = "frm" class="col-md-6 sm-3">  
        <h1>Login</h1>  
        <form name="f1" action = "authentication.php" onsubmit = "return validation()" method = "POST">  
            <p>  
                <label> UserName: </label>  
                <input type = "text" class = "form-control" id ="user" name  = "user" />  
            </p>  
            <p>  
                <label> Password: </label>  
                <input type = "password" class = "form-control" id ="pass" name  = "pass" />  
            </p>  
            <p>     
                <input type =  "submit" class = "form-control" id = "btn" value = "Login" />  
            </p>  
            <?php if(isset($_SESSION['login'])) {
                echo "<p id='flogin'>FAILED LOGIN<p>";
            } ?>
			<a href="" class=" btn" style="color: darkred; text-align:center; background-color: #112638">
				Register</a>
        </form>  
    </div>  
    
    <!--// check for empty fields  -->
    <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if(id.length>22){
                        alert("User Name can not have more than 22 characters")
                        return false;  
                    }

                    if (ps.length=="") {  
                        alert("Password field is empty");  
                        return false;  
                    }  
                    if(ps.length>22){
                        alert("password cannot have more than 22 characters")
                        return false;  
                    }
					if(ps.length<4){
						alert("password cannot have less than 4 characters")
                        return false;
					}
                }                             
            }  
        </script> 
</div> 
</body>     
</html>  