<?php
include 'header.php';

include('student.php'); 
include('subject.php'); 

$result = getSubjects4Statement($_SESSION['Username']);
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{    
    $name = $row['subname'];
    $subject_id = get_subject_id($name);
    if (isset($_POST[$subject_id])){
        make_statement($_SESSION['Username'], $name);
    }
}

echo '<br>Ολα τα μαθήματα:<br>';
$result = getSubjects4Statement($_SESSION['Username']);
echo "<BR><form action='make_statement.php' method='post'>";
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{    
    $name = $row['subname'];
    $subject_id = get_subject_id($name);
    echo "<input type='checkbox' name='".$subject_id."'>".$name."<br>";
}
echo "<button type='submit'>Δήλωση</button>";
echo "</form>"
?>
</body>
</div>
</html>