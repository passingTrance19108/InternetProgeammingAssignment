<?php 
    session_start(); 
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
        // last request was more than 30 minutes ago
        session_unset();     // unset $_SESSION variable for the run-time 
        session_destroy();   // destroy session data in storage
        if( basename( $_SERVER['PHP_SELF'] ) != 'index.php' ){  //if user is not in the login page redirect there
            header('index.php');
        }
    }else{
        $_SESSION['LAST_ACTIVITY'] = time();
        if( basename( $_SERVER['PHP_SELF'] ) == 'index.php' ){  //if user is in the login page redirect to main (session still not timed out)
            header("Location:MainPage.php");
        }
    
    }
?>