<?php
include 'Components/header.php';
?>
<div class="container" style="margin-top: 5%;">

<label class="text-danger">
<?php
if (isset($_POST['newSubject']) and trim($_POST['name']) != '') {
    include 'Components/Functions/subject.php';
    if (insert_subject($_POST['name'], $_POST['description'])) {
        echo "Η εισαγωγή του μαθήματος " . $_POST['name'] . " πέτυχε.<BR><BR>";
    } else {
        echo "Το μάθημα αυτό υπάρχει ήδη!<BR><BR>";
    }
}
?>
</label>
<form method="POST" class="border alert">
    <label class="form-label">Όνομα μαθήματος:    </label><br>
     <input type="text" name="name" class="form-text" minlength="4" required><br>
    <label class="form-label">Περιγραφή μαθήματος:</label><br>
     <textarea type="text" name="description" class="col-9" placeholder="Description" rows="5" required></textarea><br>
    <input type="submit" value="Εισαγωγή" name="newSubject">
</form>
</div>

</div>
</body>
</html>