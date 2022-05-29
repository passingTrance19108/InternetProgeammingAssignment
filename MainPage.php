<?php
include 'Components/header.php';
?>
    
        <?php
        echo "<div class='container'>";
        if ($_SESSION['Role'] == 'student') {
            echo '<p>Ολα τα μαθήματα:</p>';
            include('student.php'); 

        ?>
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Year</th>
                        <th>Final Grade</th>
                    </tr>

                </thead>
                <tbody>
        <?php

            $result = getAllSubjects($_SESSION['Username']);
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                $name = $row['subname'];
                $final = $row['final_grade'];
                $year = $row['year'];
                $lectureID = $row['lectureID'];
                $studentID = $row['studentID'];
                
                $DeleteButton="";//for non permament (not assigned final grade) statemets
                if(!$final){
                    $form = "<form class='statementForm' action='DeleteStatement.php' method='POST' onsubmit='return confirm()'>
                            <input type='hidden' id='lectureID' name='lectureID' value='$lectureID'>
                            <input type='hidden' id='studentID' name='studentID' value='$studentID'>
                            <input type='submit' id='submit' name='submit' value='delete'>
                        </form>";
                    
                    $DeleteButton = $form;
                }

                echo "<tr><td>$name</td><td>$year</td><td>$final $DeleteButton </td></tr>";
                
                // echo $name." - " . $year . " - " . $final . "<br>";
                
                
                
            }
            echo "</tbody></table>";
            
            echo "<ul class='list-group'><a href='make_statement.php'>Δήλωση μαθήματος</a></ul>";
            
        }
        if ($_SESSION['Role'] == 'Teacher') {
            echo "<p><h6 class='text-center'>Επιλέξτε μάθημα για βαθμολόγηση:</h6></p><br>";
            include('teacher.php'); 
            $result = getAllSubjects($_SESSION['Username']);
            echo "<table class='table table-bordered col-lg-9 offset-lg-1'>";
            ?>
                <tr>
                    <th>Course</th>
                    <th>Year</th>
                    <th>Semester</th>
                </tr>
            <?php
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
        if ($_SESSION['Role'] == 'administrator') {?>
            <ul class="list-group" style="margin-top: 5%;">
             <li class="list-group-item"><a href='insertSubject.php'>Εισαγωγή μαθήματος</a></li>
             <li class="list-group-item"><a href='setSubject.php'>Ανάθεση μαθήματος</a></li>
            </ul>
        <?php    
        }
        echo "</div>";
        ?>

</div>
</body>
</html>
