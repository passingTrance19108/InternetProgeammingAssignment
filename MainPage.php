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
                <thead>
                <tr>
                    <th>Course</th>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>Theory weight</th>
                    <th>Lab weight</th>
                    <th></th>
                </tr>
                </thead>
            <?php
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                $lecid = $row['lecid'];
                $name = $row['subname'];
                $semester = $row['semester'];
                $year = $row['yearr'];
                $TheoryWeight = $row['wtheory'];
                $LabWeight = $row['wlab'];
                ?>
                
                <tr class="editable"> 
                
                    <td class="uneditable"><a href="grade.php?lecid=<?php echo $lecid . "&name=" . $name ?>"><?php echo $name; ?></a></td>
                    <td class="uneditable"><?php echo $year; ?></td>
                    <td class="uneditable"><?php echo $semester; ?></td>
                    <td                   ><?php echo $TheoryWeight; ?></td>
                    <td                   ><?php echo $LabWeight; ?></td>

                    <input type="hidden" name="lid" value="<?php echo $lecid; ?>"  disabled>

                    <td><input type="submit" name="submit" value="submit" onclick="checkfields()"  disabled></td>
                    
                </tr>
                
                <?php
                // echo "<a href='grade.php?lecid=" . $lecid . "&name=" . $name . "'>".$name." - " . $year . " - " . $semester . "</a><br>";
            }
            echo "</table>";
            ?>
                <form action="modifyLectureWeight.php" method="POST" id="Changeform">
                    <input id="theory"    type="hidden" alt="text"   name="theory" />
                    <input id="lab"       type="hidden" alt="text"   name="lab" />
                    <input id="lectureID" type="hidden" alt="text"   name="lectureID" />
                    <!-- <input type="hidden"  alt="submit" name="submit" value="submit"  /> -->
                </form>
            <?php
            
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





<?php //allowing for editing the weights
    if(isset($_SESSION['Role']) && ($_SESSION['Role'] == "Teacher" || ( isset( $_SESSION['mask'] ) && $_SESSION['mask']=="Teacher" ))){
?>
<script>
    $(document).ready(function(){
        
        
        var row ="";
         $("tr").dblclick(function(){
            if(row!="") return;
            $(this).addClass("beingEdited");
            row = $(this).html();
           

            $(this).find("td").each(function(ind, el){
                if( $(el).hasClass("uneditable")){return;}
                if( $(el).find("input").length > 0 ){$(el).find("input").removeAttr("disabled");return;}
                var data = $(this).text();
                
                name = "";
                if(ind == 3){name="id='tweight'"};
                if(ind == 4){name="id='lweight'"};
                
                $(this).html("<input type='text' "+name+" value=' "+data+"'>");
                
            });

            
        });

        $(document).keydown(function(e){
            if(e.key === "Escape" && row!=""){
                //undo changes
                undoChangesToRow();
            }
            else if(e.key === "Enter" && row!=""){
                checkfields();

            }
        });

       

        //undo change function
        function undoChangesToRow(){
            if(row == ""){return "row not being edited"}

            $(".beingEdited").html(row);
            $(".beingEdited").removeClass("beingEdited");
            row="";
        }

         //$("td").
     })
    
    
     function checkfields(){
        theory = $("#tweight").val();
        lab    = $("#lweight").val(); 
        lecID  = $("input[name='lid']",".beingEdited").val();
        $("body").append("t:"+theory+" lab:"+lab+"|"+lecID+"|");

        message="";
        if( !$.isNumeric(theory) ) message = message +"theory not integer(0-100)\n";
        if( !$.isNumeric(lab)    ) message = message +"lab not integer(0-100)\n";
        
        if(message != ""){ cancelSubmit(message);return;}

        if( (Number(theory) + Number(lab)) != 100 ){ cancelSubmit("Lab and theory weights do not sum up to 100%");return;}

        $("#theory" ).val(theory);
        $("#lab" ).val(lab);
        $("#lectureID" ).val( lecID );

        document.getElementById("Changeform").submit();
        

     }

     function cancelSubmit(message){
        alert(message);
        undoChangesToRow();
        return false;
     }

</script>
<?php
    }
?>