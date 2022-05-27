<?php
include 'Components/header.php';

if (isset($_POST['newSubject']) and trim($_POST['name']) != '') {
    include 'subject.php';
    if (insert_subject($_POST['name'], $_POST['description'])) {
        echo "Η εισαγωγή του μαθήματος " . $_POST['name'] . " πέτυχε.<BR><BR>";
    } else {
        echo "Το μάθημα αυτό υπάρχει ήδη!<BR><BR>";
    }
}
?>

<form method="POST">
    Όνομα μαθήματος: <input type="text" name="name"><br>
    Περιγραφή μαθήματος: <textarea type="text" name="description"></textarea><br>
    <input type="submit" value="Εισαγωγή" name="newSubject">
</form>

</div>
</body>
</html>