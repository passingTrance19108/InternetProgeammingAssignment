<?php
    function getAllSubjects($username) {

        include('connection.php'); 

        $sql = "SELECT sub.name as subname 
        FROM statement sta, user u, lecture lec, subject sub 
        WHERE u.registration_num_id = sta.student_id and u.login = ? and lec.id = sta.lecture_id and sub.id = lec.subject_id";

        $stmnt = mysqli_prepare($con, $sql);
        $stmnt->bind_param("s",$username);
        $stmnt->execute();

        $result = $stmnt->get_result();  
        return $result;
    }
    
    function getSubjects4Statement($username) {

        include('connection.php'); 

        $sql = "select sub.name as subname
        from subject sub, user u
        where u.login = ?
        and sub.id not in (
            SELECT lec.subject_id
            FROM statement sta, lecture lec
            where u.login = ? and u.registration_num_id = sta.student_id and sta.final_grade >= 5 and sta.lecture_id = lec.id)
        and sub.id not in (
            SELECT pre.subject_id
            from prerequisite_subjects pre, statement sta2, lecture lec2
            where pre.subject_id = sub.id and pre.prerequisite_id = lec2.subject_id and lec2.id = sta2.lecture_id and sta2.final_grade < 5 and u.login = ? and u.registration_num_id = sta2.student_id)
        and sub.id not in (
            SELECT pre.subject_id
            from prerequisite_subjects pre
            where pre.subject_id = sub.id and pre.prerequisite_id not in (
                SELECT lec3.subject_id
                from statement sta3, lecture lec3
                where u.registration_num_id = sta3.student_id and sta3.lecture_id = lec3.id and u.login = ? and u.registration_num_id = sta3.student_id))
        and sub.id not in (
            SELECT lec4.subject_id
            FROM statement sta4, lecture lec4
            WHERE u.login = ? and u.registration_num_id = sta4.student_id and lec4.id = sta4.lecture_id and sta4.final_grade is NULL)";

        $stmnt = mysqli_prepare($con, $sql);
        $stmnt->bind_param("sssss",$username, $username, $username, $username, $username);
        $stmnt->execute();

        $result = $stmnt->get_result();  
        return $result;
    }
    
?>