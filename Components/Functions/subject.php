<?php
    function get_lecture_id($subject_name) {
        include('Components/connection.php');

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
        include('Components/connection.php'); 

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

    function get_subject($id) {
        include('Components/connection.php'); 

        $sql = "SELECT id, name, description
        from subject 
        where id = ?";

        $stmnt = mysqli_prepare($con, $sql);
        $stmnt->bind_param("s",$id);
        $stmnt->execute();

        $result = $stmnt->get_result();  
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {    
            return $row;
        }
        return NULL;
        
    }    

    function find_subject($name) {
        include('Components/connection.php'); 

        $sql = "SELECT * FROM subject sub WHERE sub.name = ?";

        $stmnt = mysqli_prepare($con, $sql);
        $stmnt->bind_param("s",$name);
        $stmnt->execute();

        $result = $stmnt->get_result();  
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {                
            return True;
        }
        return False;
    }

    function insert_subject($name, $description) {
        if (find_subject($name)) {
            return False;
        }
        $sql = "insert into subject(name,description) values(?, ?)";

        include('Components/connection.php'); 
        $stmnt = mysqli_prepare($con, $sql);
        $stmnt->bind_param("ss",$name,$description);
        $stmnt->execute();
        return True;        
    }

    function get_all_subjects() {
        include('Components/connection.php'); 

        $sql = "SELECT * FROM subject";

        $stmnt = mysqli_prepare($con, $sql);
        $stmnt->execute();

        $result = $stmnt->get_result();  
        return $result;          
    }

    function get_subjects_starting($name) {
        include('Components/connection.php'); 

        $name = "$name%";

        $sql = "SELECT * FROM subject sub WHERE sub.name LIKE ?";

        $stmnt = mysqli_prepare($con, $sql);
        $stmnt->bind_param("s",$name);
        $stmnt->execute();

        $result = $stmnt->get_result();          
        return $result;
    }

    function set_subject($id, $name, $description) {
        include('Components/connection.php'); 

        if (get_subject_id($name) != NULL and get_subject_id($name) != $id) {
            return False;
        }

        $sql= "update subject set name=?, description=? where id=?";

        $stmnt = mysqli_prepare($con, $sql);
        $stmnt->bind_param("sss",$name,$description,$id);
        $stmnt->execute();
        return True;
    }

    function delete_subject($id) {
        include('Components/connection.php'); 

        $sql = "delete from subject where id=?";

        $stmnt = mysqli_prepare($con, $sql);
        $stmnt->bind_param("s",$id);
        $stmnt->execute();
    }

?>