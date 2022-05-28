<?php
    include 'Components/header.php';
?>

<script>
function showCourses(str) {
    
        var objXMLHttpRequest = new XMLHttpRequest();
        objXMLHttpRequest.onreadystatechange = function() {
            if(objXMLHttpRequest.readyState === 4) {
                if(objXMLHttpRequest.status === 200) {
                    document.getElementById("txtHint").innerHTML = objXMLHttpRequest.responseText;
                } else {
                    alert('Error Code: ' +  objXMLHttpRequest.status);
                    alert('Error Message: ' + objXMLHttpRequest.statusText);
                }
            }
        }
        objXMLHttpRequest.open("GET","getcourses.php?q="+str,true);
        objXMLHttpRequest.send();
    
}
</script>

<div class="container" > <!--  -->
    <div class="text-center "><h2> Courses </h2></div>
    <label>Enter course name</label>
    <input type="text" name="name" oninput="showCourses(this.value)" placeholder="Course"><BR><BR><BR><BR>
    <div id='txtHint'>
        
        
    </div>
</div>


</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
</body>
</html>

<script>
    $(document).ready(function(){
        showCourses("");
    })
</script>