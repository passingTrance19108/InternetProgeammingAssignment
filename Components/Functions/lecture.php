<?php

function lecture_exists($subject_id, $teacher_id, $year, $semester) {
    include 'Components/connection.php';

    $sql ="select * from lecture where subject_id =? and teacher_id =? and year =? and semester =?";

    $stmnt = mysqli_prepare($con, $sql);
    $stmnt->bind_param("ssss",$subject_id,$teacher_id,$year,$semester);
    $stmnt->execute();

    $result = $stmnt->get_result();  
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {                
        return True;
    }
    return False;
}
?>