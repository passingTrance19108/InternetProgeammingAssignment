<?php
function getAllSubjects($username) {

    include('connection.php'); 

    $sql = "SELECT sub.name as subname 
    FROM user u, teacher t, lecture lec, subject sub
    WHERE u.login= ? and t.Id = u.teacher_id and lec.teacher_id = t.Id and lec.subject_id = sub.id";

    $stmnt = mysqli_prepare($con, $sql);
    $stmnt->bind_param("s",$username);
    $stmnt->execute();

    $result = $stmnt->get_result();  
    return $result;
}
?>