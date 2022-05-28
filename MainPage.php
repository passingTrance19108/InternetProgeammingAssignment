<?php
include 'Components/header.php';
?>
    
        <?php
        echo "<div class='container'>";
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
            echo "<p><h6 class='text-center'>Επιλέξτε μάθημα για βαθμολόγηση:</h6></p><br>";
            include('teacher.php'); 
            $result = getAllSubjects($_SESSION['Username']);
            echo "<table class='table table-bordered'>";
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                $lecid = $row['lecid'];
                $name = $row['subname'];
                $semester = $row['semester'];
                $year = $row['yearr'];
                ?>
                
                <tr>
                
                    <td><a href="grade.php?lecid=<?php echo $lecid . "&name=" . $name ?>"><?php echo $name; ?></a></td>
                    <td><?php echo $year; ?></td>
                    <td><?php echo $semester; ?></td>
                
                </tr>
                
                <?php
                // echo "<a href='grade.php?lecid=" . $lecid . "&name=" . $name . "'>".$name." - " . $year . " - " . $semester . "</a><br>";
            }
            echo "</table>";
            
        }
        if ($_SESSION['Role'] == 'administrator') {
            echo "<a href='insertSubject.php'>Εισαγωγή μαθήματος</a><BR>";
            echo "<a href='setSubject.php'>Ανάθεση μαθήματος</a><BR>";
        }
        echo "</div>";
        ?>

</div>
</body>
</html>