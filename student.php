<?php
    function getAllSubjects($username) {

        include('connection.php'); 

        $sql = "SELECT sub.name as subname, sta.final_grade as final_grade, lec.year as 'year', sta.lecture_id as lectureID, sta.student_id as studentID
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
            WHERE u.login = ? and u.registration_num_id = sta4.student_id and lec4.id = sta4.lecture_id and sta4.final_grade is NULL)
        and sub.id IN (
            SELECT lec5.subject_id
            from lecture lec5
            where lec5.year = 2022 and mod(lec5.semester, 2) = 0)";

        $stmnt = mysqli_prepare($con, $sql);
        $stmnt->bind_param("sssss",$username, $username, $username, $username, $username);
        $stmnt->execute();

        $result = $stmnt->get_result();  
        return $result;
    }

    function get_student_id($username) {
        include('connection.php'); 

        $sql = "SELECT stu.registration_num as id
        FROM user u, student stu 
        where u.registration_num_id = stu.registration_num and u.login = ?";

        $stmnt = mysqli_prepare($con, $sql);
        $stmnt->bind_param("s",$username);
        $stmnt->execute();

        $result = $stmnt->get_result();  
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {    
            $id = $row['id'];
            return $id;
        }
        return NULL;
    }

    function make_statement($username, $subject_name) {
        include('connection.php'); 
        
        $student_id = get_student_id($username);        
        $lecture_id = get_lecture_id($subject_name);

        // $check = "Select * from statement where lecture_id='$lecture_id' AND student_id='$student_id'";
        // $checkResult = $con->query($check);
        // if() {return "Already declared";}
        
        $sql = "INSERT INTO statement (lecture_id, student_id) VALUES ('$lecture_id', '$student_id')";
        if ($con->query($sql) === TRUE) {
            echo "Το μάθημα " . $subject_name . " δηλώθηκε επιτυχώς.<BR>";
        } else {
            echo "Πρόβλημα κατά τη δήλωση του μαθήματος " . $subject_name;
        }

    }
    
?>