<?php
include 'Components/header.php';
?>
<script>
function getcsv(str) {
    var objXMLHttpRequest = new XMLHttpRequest();
    objXMLHttpRequest.onreadystatechange = function() {
        if(objXMLHttpRequest.readyState === 4) {
            if(objXMLHttpRequest.status === 200) {
                document.getElementById('my_iframe').src = str+'.csv'; //download
            } else {
                alert('Error Code: ' +  objXMLHttpRequest.status);
                alert('Error Message: ' + objXMLHttpRequest.statusText);
            }
        }
    }
    objXMLHttpRequest.open("GET","get_csv.php?q="+str,true);
    objXMLHttpRequest.send();
    return false;
}
</script>
<iframe id="my_iframe" style="display:none;"></iframe>
<div class="container">

    <?php

    echo "<p><h6 class='text-center'>". $_GET['name'] ."</h6> <a href='' onclick=\"return getcsv('". $_GET['name'] ."')\">Εξαγωγή βαθμολογίας σε csv.</a></p>";
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

                echo "<tr><td>". $surname . "</td> " ;
                echo "<td>". $name . "</td> " ;
                echo "<td><input type='text' name='theory' value='" . $theory . "'></td>";
                echo "<td><input type='text' name='lab' value='". $lab . "'></td>";
                echo "<td><input type='text' name='grade' value='" . $grade . "'></td>";

                echo "    <input type='hidden' name='staid' value='" . $staid . "'>";
                echo "    <input type='hidden' name='lecid' value='" . $_GET['lecid'] . "'>";
                echo "    <input type='hidden' name='subname' value='" . $_GET['name'] . "'>";
                echo "<td><input type='submit' value='Βαθμολόγησε'></td></tr>";

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

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
</body>
</html>

<script>
    $(document).ready(function(){
        showCourses("");
    })
</script>