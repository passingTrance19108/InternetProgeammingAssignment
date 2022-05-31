<?php
include 'Components/header.php';

include('Components/Functions/student.php'); 
include('Components/Functions/subject.php'); 

$result = getSubjects4Statement($_SESSION['Username']);
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{    
    $name = $row['subname'];
    $subject_id = get_subject_id($name);
    if (isset($_POST[$subject_id])){
        make_statement($_SESSION['Username'], $name);
    }
}


echo "<div class='container'>";
echo '<br>Ολα τα μαθήματα:<br>';
$result = getSubjects4Statement($_SESSION['Username']);
echo "<BR><form action='make_statement.php' method='post'>";
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{    
    $name = $row['subname'];
    $subject_id = get_subject_id($name);
    echo "<div style='border: solid 0.5px;' class='col-6'><input type='checkbox' name='".$subject_id."'>".$name."</div>";
}
echo "<button type='submit'>Δήλωση</button>";
echo "</form></div>"
?>
</body>
</div>
</html>