<?php
    include 'Components/header.php';

    include 'Components/connection.php';
    include 'Components/Functions/subject.php';
    include 'Components/Functions/teacher.php';
?>
<div id="frm" class="container " style="margin-top: 5%; ">
<?php
    if (isset($_POST['subject_id'])) {
        $subject_id = $_POST['subject_id'];
        $teacher_id = $_POST['teacher_id'];
        $year = $_POST['year'];
        $semester = $_POST['semester'];
        $weight_theory = $_POST['weight_theory'];
        $weight_lab = $_POST['weight_lab'];
        $constraint_theory = $_POST['constraint_theory']; 
        $constraint_lab = $_POST['constraint_lab'];
        if (set_lecture($subject_id, $teacher_id, $year, $semester, $weight_theory, $weight_lab, $constraint_theory, $constraint_lab)) {
            echo 'Η ανάθεση του μαθήματος έγινε επιτυχώς.<BR>'; 
        } else {
            echo 'Η ανάθεση του μαθήματος δεν έγινε καθώς υπάρχει ήδη.<BR>'; 
        }
    }
    echo "<form method='post' >";
    echo "<div class=''><label>μάθημα: </label><select  class='form-control' name='subject_id'>";
    $result = get_all_subjects(); 
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {    
        $name = $row['name'];
        $id = $row['id'];
        echo "<option value='" . $id . "'>" . $name . "</option>";
    }
    echo "</select></div>";

    echo "<div class=''><label>καθηγητής: </label><select  class='form-control' name='teacher_id'>";
    $result = get_all_teachers(); 
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {    
        $name = $row['name'];
        $surname = $row['surname'];
        $id = $row['Id'];
        echo "<option value='" . $id . "'>" .$surname. " ". $name . "</option>";
    }
    echo "</select></div>";

    echo "<div class=''><label>έτος: </label><select  class='form-control' name='year'>"; 
    for ($i = 2019; $i <= 2022; $i++) {
        echo "<option value='" . $i . "'>" .$i. "</option>";
    }
    echo "</select></div>";

    echo "<div class=''><label>εξάμηνο: </label><select  class='form-control' name='semester'>"; 
    for ($i = 1; $i <= 10; $i++) {
        echo "<option value='" . $i . "'>" .$i. "</option>";
    }
    echo "</select></div>";

    echo "<div class=''><label class=''>βάρος θεωρίας:            </label> <input class='form-control' type='text' name='weight_theory'></div>";
    echo "<div class=''><label class=''>βάρος εργαστηρίου:        </label> <input class='form-control' type='text' name='weight_lab'></div>";
    echo "<div class=''><label class=''>περιορισμοί θεωρίας:      </label> <input class='form-control' type='text' name='constraint_theory'></div>";
    echo "<div class=''><label class=''>περιορισμοί εργαστηρίου:  </label> <input class='form-control' type='text' name='constraint_lab'></div>";
    echo "<div class=' '><input type='submit' value='Ανάθεση μαθήματος σε καθηγητή' style='margin-top: 5px;'></div>";
    echo "</form></div>";

?>

</div>
</body>
</html>

