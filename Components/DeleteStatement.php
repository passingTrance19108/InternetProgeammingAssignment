<?php 
    include('connection.php');

    $lecture_id = $_POST['lectureID'];
    $student_id = $_POST['studentID'];

    $sql = "DELETE FROM `statement` WHERE lecture_id =? AND student_id =?";
    $statement = mysqli_prepare($con, $sql);
    $statement->bind_param("ii", $lecture_id, $student_id);
    if(!$statement->execute()){print("failure");}
    header("Location: http://localhost/MainPage.php");

?>