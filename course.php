<?php
    include 'Components/header.php';

    include('subject.php');
    $subject = get_subject($_GET['id']);
?>
    <div class="container">
<?php
        
            echo "<p style='margin-top: 10px;'><b>Ονομα</b>: ".$subject['name']."</p>";
        ?>
    <div style="background-color: darkgrey;">

        <?php
            echo "<b>Περιγραφή</b><BR><br>";
            echo $subject['description'];
?>

    </div>

</div>
</body>
</html>