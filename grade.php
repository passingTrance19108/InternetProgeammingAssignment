<?php
include 'Components/header.php'
?>

<?php
echo $_GET['name'] . "<br>";
include('teacher.php'); 
$result = getAllStatements($_GET['lecid']);
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $surname = $row['stusurname'];
    $name = $row['stuname'];
    $theory = $row['theory'];
    $lab = $row['lab'];
    $grade = $row['grade'];
    $staid = $row['staid'];
    
    echo "<form method='post' action='make_grade.php'>";
    echo $surname . " " . $name . " theory:<input type='text' name='theory' value='" . $theory . "'> lab:<input type='text' name='lab' value='". $lab . "';> final grade:<input type='text' name='grade' value='" . $grade . "'><input type='hidden' name='staid' value='" . $staid . "'><input type='hidden' name='lecid' value='" . $_GET['lecid'] . "'><input type='hidden' name='subname' value='" . $_GET['name'] . "'><input type='submit' value='Βαθμολόγησε'><br>";
    echo "</form>";
}
?>

</body>
</div>
</html>