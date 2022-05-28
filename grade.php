<?php
include 'Components/header.php'
?>
<div class="container">

    <?php
    echo "<p><h6 class='text-center'>". $_GET['name'] ."</h6></p>";
    include('teacher.php'); 
    $result = getAllStatements($_GET['lecid']);
    ?>
    <table class="table table-bordered">
        <thead>
            <th>Surname</th>
            <th>Name</th>
            <th>Theory</th>
            <th>Lab</th>
            <th>Final</th>
            <th>Button</th>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                $surname = $row['stusurname'];
                $name = $row['stuname'];
                $theory = $row['theory'];
                $lab = $row['lab'];
                $grade = $row['grade'];
                $staid = $row['staid'];
                
                echo "<form method='post' action='make_grade.php'>";

                echo "<td>". $surname . "</td> " ;
                echo "<td>". $name . "</td> " ;
                echo "<td><input type='text' name='theory' value='" . $theory . "'></td>";
                echo "<td><input type='text' name='lab' value='". $lab . "'></td>";
                echo "<td><input type='text' name='grade' value='" . $grade . "'></td>";

                echo "<input type='hidden' name='staid' value='" . $staid . "'>";
                echo "<input type='hidden' name='lecid' value='" . $_GET['lecid'] . "'>";
                echo "<input type='hidden' name='subname' value='" . $_GET['name'] . "'>";
                echo "<td><input type='submit' value='Βαθμολόγησε'><br></td>";

                echo "</form>";
            } 
            // We can have the final grade be automatically filled from the previous 2 
            //using the grading data from the database
            ?>
        </tbody>
    </table>
</div>
</body>
</div>
</html>