<?php
include 'Components/header.php';
?>

        <?php
        if ($_SESSION['Role'] == 'student') {
            echo 'Ολα τα μαθήματα:<br>';
            include('student.php'); 
            $result = getAllSubjects($_SESSION['Username']);
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                $name = $row['subname'];
                $final = $row['final_grade'];
                $year = $row['yearr'];
                
                echo $name." - " . $year . " - " . $final . "<br>";
            }
            echo "<a href='make_statement.php'>Δήλωση μαθήματος</a>";
        }
        if ($_SESSION['Role'] == 'Teacher') {
            echo 'Επιλέξτε μάθημα για βαθμολόγηση:<br>';
            include('teacher.php'); 
            $result = getAllSubjects($_SESSION['Username']);
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                $lecid = $row['lecid'];
                $name = $row['subname'];
                $semester = $row['semester'];
                $year = $row['yearr'];
                
                echo "<a href='grade.php?lecid=" . $lecid . "&name=" . $name . "'>".$name." - " . $year . " - " . $semester . "</a><br>";
            }
            
        }
        if ($_SESSION['Role'] == 'administrator') {
            echo "<a href='insertSubject.php'>Εισαγωγή μαθήματος</a>";
        }
        ?>

</div>
</body>
</html>