<?php
    include('teacher.php');
    
    $result = getAllSubjectStatements($_GET['q']);

    $delimiter = ';';

    $file = fopen($_GET['q'].".csv","w");
    fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF)); //UTF-8
    fputcsv($file, ['surname', 'name', 'grade_theory', 'grade_lab', 'final_grade'], $delimiter);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {                
        /*$surname =$row['surname'];
        $name =$row['name'];
        $grade_theory =$row['grade_theory'];
        $grade_lab =$row['grade_lab'];
        $final_grade =$row['final_grade'];
        */
        fputcsv($file, $row, $delimiter);
    }
    
    fclose($file);
    

?>