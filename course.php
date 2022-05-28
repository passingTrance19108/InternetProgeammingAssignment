<?php
    include 'Components/header.php';

    include('subject.php');

    if ($_SESSION['Role'] == 'administrator') {

        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            if (set_subject($id, $name, $description)) {
                echo 'Η ενημέρωση ήταν επιτυχής.<BR>';
            } else {
                echo 'Το όνομα δεν μπορεί να αλλάξει σε ' . $name . '. Υπάρχει άλλο μάθημα με αυτό το όνομα.<BR>';
            }
        } else if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            delete_subject($id);
            echo 'Το μάθημα διεγράφη επιτυχώς.<BR>';
        } else {
            $id = $_GET['id'];
        }
    } else {
        $id = $_GET['id'];
    }

    if (!isset($_POST['delete'])) {
        $subject = get_subject($id);
        echo "<form method='POST'>";
        echo "<b>Ονομα</b><BR>";
        echo "<input type='text' size=133 name='name' value='" . $subject['name'] . "'><BR>";
        echo "<b>Περιγραφή</b><BR>";
        echo "<textarea name='description' rows=10 cols=133>" . $subject['description'] . "</textarea><BR>";
        echo "<input type='hidden' name='id' value='" . $subject['id'] . "'>";
        if ($_SESSION['Role'] == 'administrator') {
            echo "<input type='submit' name='update' value='Ενημέρωση'><BR>";
            echo "<input type='submit' name='delete' value='Διαγραφή'><BR>";
        }
        echo "</form>";
    }
?>



</div>
</body>
</html>