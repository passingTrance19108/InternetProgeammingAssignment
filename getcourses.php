<?php
    include('subject.php');
    $result = get_subjects_starting($_GET['q']);
    $responseText = '';
    echo "<table class='table table-bordered'>";
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {                
        $id =$row['id'];
        $name =$row['name'];
        $responseText =$responseText . "<tr><td><a href='course.php?id=" . $id . "'>" . $name . "</tr></td>";
    }
    echo $responseText;
    echo "</table>";
?>