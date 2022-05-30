<?php
function getAllSubjects($username) {

    include('connection.php'); 

    $sql = "SELECT lec.id as lecid, sub.name as subname, lec.year as yearr, lec.semester as semester, lec.weight_theory as wtheory, lec.weight_lab as wlab
    FROM user u, teacher t, lecture lec, subject sub
    WHERE u.login= ? and t.Id = u.teacher_id and lec.teacher_id = t.Id and lec.subject_id = sub.id";

    $stmnt = mysqli_prepare($con, $sql);
    $stmnt->bind_param("s",$username);
    $stmnt->execute();

    $result = $stmnt->get_result();  
    return $result;
}

function getAllStatements($lecture_id) {
    include('connection.php'); 

    $sql = "SELECT stu.surname as stusurname, stu.name as stuname, sta.grade_theory as theory, sta.grade_lab as lab, sta.final_grade as grade, sta.id as staid
    from statement sta, student stu 
    where sta.lecture_id = ? and sta.student_id = stu.registration_num
    ORDER by final_grade";

    $stmnt = mysqli_prepare($con, $sql);
    $stmnt->bind_param("s",$lecture_id);
    $stmnt->execute();

    $result = $stmnt->get_result();  
    return $result;    
}

function gradeStudent($stament_id, $lab, $theory, $final_grade) {
    include('connection.php'); 
    $sql = "UPDATE statement sta
    set sta.final_grade = ?, sta.grade_lab = ?, sta.grade_theory = ?
    where sta.id = ?";

    $stmnt = mysqli_prepare($con, $sql);
    $stmnt->bind_param("dddi",$final_grade,$lab,$theory,$stament_id);
    return $stmnt->execute();
}

function get_all_teachers() {
    include('connection.php');

    $sql = "SELECT * FROM teacher";

    $stmnt = mysqli_prepare($con, $sql);
    $stmnt->execute();

    $result = $stmnt->get_result();  
    return $result;          
}
function set_lecture($subject_id, $teacher_id, $year, $semester, $weight_theory, $weight_lab, $constraint_theory, $constraint_lab) {

    include 'lecture.php';    
    if (lecture_exists($subject_id, $teacher_id, $year, $semester)) {
        return False;
    }
    include('connection.php');
    $sql = "insert into 
    lecture(subject_id, teacher_id, year, semester, weight_theory, weight_lab, theory_constraint, lab_constraint) 
    values(?, ?, ?, ?, ?, ?, ?, ?)";

    if ($weight_theory == '') {
        $weight_theory = NULL;
    }
    if ($weight_lab == '') {
        $weight_lab = NULL;
    }
    if ($constraint_theory == '') {
        $constraint_theory = NULL;
    }
    if ($constraint_lab == '') {
        $constraint_lab = NULL;
    }

    error_reporting(E_ALL);
ini_set('display_errors', 1);


    $stmnt = mysqli_prepare($con, $sql);

    $stmnt->bind_param("iiiiiiii",$subject_id, $teacher_id, $year, $semester, $weight_theory, $weight_lab, $constraint_theory, $constraint_lab);


    $stmnt->execute();
    return True;        
}
?>