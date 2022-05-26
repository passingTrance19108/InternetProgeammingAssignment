<?php 
    session_start(); 
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 3600)) {
        // last request was more than 30 minutes ago
        session_unset();     // unset $_SESSION variable for the run-time 
        session_destroy();   // destroy session data in storage
        if( basename( $_SERVER['PHP_SELF'] ) != 'index.php' ){  //if user is not in the login page redirect there
            header('index.php');
        }
    }else{//if user is in the login page redirect to main 
        $_SESSION['LAST_ACTIVITY'] = time();
        if( basename( $_SERVER['PHP_SELF'] ) == 'index.php' && 
            isset($_SESSION['Role']) && ($_SESSION['Role'] == 'student' || $_SESSION['Role'] == "Teacher")){  
            header("Location:MainPage.php?v=" . isset($_SESSION['Role']));
        }
    
    }
?>