<?php
    include 'Components/header.php';

    include('subject.php');
    $subject = get_subject($_GET['id']);
    echo "<b>Ονομα</b><BR>";
    echo $subject['name'] . "<BR>";
    echo "<b>Περιγραφή</b><BR>";
    echo $subject['description'];
?>



</div>
</body>
</html>