<?php
include 'header.php';

echo 'Ολα τα μαθήματα:<br>';
include('student.php'); 
$result = getSubjects4Statement($_SESSION['Username']);
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $name = $row['subname'];
    
    echo $name."<br>";
}
?>
</body>
</div>
</html>