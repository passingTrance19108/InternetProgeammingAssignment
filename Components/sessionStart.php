<?php 
    session_start(); 
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 3600)) {
        // last request was more than 30 minutes ago
        session_unset();     // unset $_SESSION variable for the run-time 
        session_destroy();   // destroy session data in storage
        if( basename( $_SERVER['PHP_SELF'] ) != 'index.php' ){  //if user is not in the login page redirect there
            header('Location: http://localhost/MainPage.php');
        }
    }else{//if user is in the login page redirect to main 
        $_SESSION['LAST_ACTIVITY'] = time();
        if( basename( $_SERVER['PHP_SELF'] ) == 'index.php' ){
            if(isset($_SESSION['Role']) && ($_SESSION['Role'] == 'student' || $_SESSION['Role'] == "Teacher")){  
                header("Location: http://localhost/MainPage.php?v=" . isset($_SESSION['Role']));
            }
            else if ( isset($_SESSION['Role'])  && ($_SESSION['Role'] == 'Guest') ){
                header("Location: http://localhost/Courses.php");
            }
        }
    }
?>