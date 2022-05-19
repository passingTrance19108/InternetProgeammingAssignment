<?php
    function get_lecture_id($subject_name) {
        include('connection.php'); 

        $sql = "SELECT lec.id as id
        from lecture lec, subject sub
        where sub.name = ? and sub.id = lec.subject_id and lec.year = 2022 and mod(lec.semester, 2) = 0";

        $stmnt = mysqli_prepare($con, $sql);
        $stmnt->bind_param("s",$subject_name);
        $stmnt->execute();

        $result = $stmnt->get_result();  
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {    
            $id = $row['id'];
            return $id;
        }
        return NULL;
        
    }

    function get_subject_id($subject_name) {
        include('connection.php'); 

        $sql = "SELECT sub.id as id
        from subject sub
        where sub.name = ?";

        $stmnt = mysqli_prepare($con, $sql);
        $stmnt->bind_param("s",$subject_name);
        $stmnt->execute();

        $result = $stmnt->get_result();  
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {    
            $id = $row['id'];
            return $id;
        }
        return NULL;
        
    }
?>