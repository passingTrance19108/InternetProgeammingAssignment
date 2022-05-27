<?php
    include('subject.php');
    $result = get_subjects_starting($_GET['q']);
    $responseText = '';
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {                
        $id =$row['id'];
        $name =$row['name'];
        $responseText =$responseText . "<a href='course.php?id=" . $id . "'>" . $name . "<BR>";
    }
    echo $responseText;
?>