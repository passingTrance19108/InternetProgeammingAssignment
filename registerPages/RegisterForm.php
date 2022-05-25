<?php 
    include '../logout'; 
?> 

<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    
    <link rel = "stylesheet" type = "text/css" href = "../style.css"> 
</head>
<body>
<div id="body">
    <div id="frm" class="col-md-6 sm-3">
        <h2 style="text-align: center; padding-bottom: 5px;">Registration page</h1> 
        <form method="post" action="validateRegistration.php" id="registerForm">
            <p>
                <label>Email address: </label>
                <input type="email" class="form-control" name="email" /> 
            </p>
            <p>  
                <label> UserName: </label>  
                <input type = "text" class = "form-control" id ="user" name  = "user" />  
            </p>  
            <p>  
                <label> Password: </label>  
                <input type = "password" class = "form-control" id ="pass" name  = "pass" />  
            </p>  
            <p>
                <label> Password-match: </label>  
                <input type="password" class="form-control" id="pass_match" name="pass_match" />
            </p>
            <p>
                <label>Register as: </label>

                <div class="col-12 form-inline">
                <label class="">Student:</label> 
                <input class="form-control col-6" id="radio_student" type="radio" name="Role" value="student" checked /> 
                </div>

                <div class="col-12 form-inline">
                <label class="">Teacher: </label>
                <input class="form-control col-6 " id="radio_teacher" type="radio" name="Role" value="Teacher" />
                </div>
            </p>
            <p>     
                <input type = "submit" class = "form-control " id = "btn" value = "Register" />  
            </p>  
        </form>

    </div>        
</div>
</body> 
</html>

<script>
    $(function(){
        $("#registerForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                user: "required",
                pass: {
                    required: true,
                    minlength: 6
                },
                pass_match: {
                    equalTo: "#pass"
                }
            },
            messages: {
                email: "email is not correct",
                user: "username is required",
                pass_match: "does not match above password"
            },
            submitHandler: function(form){
                form.submit();
            }
        });
    });
</script>