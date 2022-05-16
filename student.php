<?php
    function getSubjects($username) {

        include('connection.php'); 

        $sql = "SELECT sub.name as subname FROM statement sta, user u, lecture lec, subject sub WHERE u.registration_num_id = sta.student_id and u.login = ? and lec.id = sta.lecture_id and sub.id = lec.subject_id";

        $stmnt = mysqli_prepare($con, $sql);
        $stmnt->bind_param("s",$username);
        $stmnt->execute();

        $result = $stmnt->get_result();  
        return $result;
    }
    
    
?>