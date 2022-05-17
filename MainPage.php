<?php
include 'header.php'
?>

        <?php
        if ($_SESSION['Role'] == 'student') {
            echo 'Ολα τα μαθήματα:<br>';
            include('student.php'); 
            $result = getAllSubjects($_SESSION['Username']);
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                $name = $row['subname'];
                
                echo $name."<br>";
            }
            echo "<a href='make_statement.php'>Δήλωση μαθήματος</a>";
        }
        if ($_SESSION['Role'] == 'Teacher') {
            echo 'Ολα τα μαθήματα:<br>';
            include('teacher.php'); 
            $result = getAllSubjects($_SESSION['Username']);
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                $name = $row['subname'];
                
                echo $name."<br>";
            }
        }
        ?>

</body>
</div>
</html>