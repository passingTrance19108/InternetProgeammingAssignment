<?php
$theory = trim($_POST['theory']);
$lab = trim($_POST['lab']);
$grade = trim($_POST['grade']);
$staid = $_POST['staid'];
$lecid = $_POST['lecid'];
$subname = $_POST['subname'];

if ($lab == '') {
    $lab = NULL;
}
if ($theory == '') {
    $theory = NULL;
}
if ($grade == '') {
    $grade = NULL;
}
if ((is_numeric($lab) or $lab=='') and (is_numeric($grade) or $grade=='') and (is_numeric($theory) or $theory=='')) {

    include 'Components/Functions/teacher.php';
    if (gradeStudent($staid, $lab, $theory, $grade)) {
        echo 'Student has been graded successfully<br>';    
    } else {
        echo 'Student has NOT been graded successfully<br>';
    }
} else {
    echo "Numeric values expected as grades<br>";
}
echo "Click <a href='grade.php?lecid=" . $lecid . "&name=" . $subname . "'>here</a> to return back";
?>
