<?php 
    if( !( isset($_POST['lectureID']))){header("Location: MainPage.php");exit;}

    $sqlquery = "UPDATE `lecture` SET weight_theory=?, weight_lab=? WHERE id=?";

    include('connection.php');

    $stmnt = mysqli_prepare($con, $sqlquery);
    $stmnt->bind_param("iii", $_POST['theory'], $_POST['lab'], $_POST['lectureID'] );
    if($stmnt->execute()){
        echo 'success';
        header('Location: MainPage.php');
        exit;
    }else{
        echo 'Failed to upload';
    }
?>