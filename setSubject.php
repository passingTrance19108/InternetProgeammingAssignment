<?php
    include 'Components/header.php';

    include 'connection.php';
    include 'subject.php';
    include 'teacher.php';

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
    echo "<form method='post'>";
    echo "μάθημα:<select name='subject_id'>";
    $result = get_all_subjects(); 
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {    
        $name = $row['name'];
        $id = $row['id'];
        echo "<option value='" . $id . "'>" . $name . "</option>";
    }
    echo "</select><BR>";

    echo "καθηγητής:<select name='teacher_id'>";
    $result = get_all_teachers(); 
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {    
        $name = $row['name'];
        $surname = $row['surname'];
        $id = $row['Id'];
        echo "<option value='" . $id . "'>" .$surname. " ". $name . "</option>";
    }
    echo "</select><BR>";

    echo "έτος:<select name='year'>"; 
    for ($i = 2019; $i <= 2022; $i++) {
        echo "<option value='" . $i . "'>" .$i. "</option>";
    }
    echo "</select><BR>";

    echo "εξάμηνο:<select name='semester'>"; 
    for ($i = 1; $i <= 10; $i++) {
        echo "<option value='" . $i . "'>" .$i. "</option>";
    }
    echo "</select><BR>";

    echo "βάρος θεωρίας:<input type='text' name='weight_theory'><BR>";
    echo "βάρος εργαστηρίου:<input type='text' name='weight_lab'><BR>";
    echo "περιορισμοί θεωρίας:<input type='text' name='constraint_theory'><BR>";
    echo "περιορισμοί εργαστηρίου:<input type='text' name='constraint_lab'><BR>";
    echo "<input type='submit' value='Ανάθεση μαθήματος σε καθηγητή'>";
    echo "</form>";

?>

</div>
</body>
</html>