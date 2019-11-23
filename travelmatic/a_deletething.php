<?php 

require_once 'dbconnect.php';

if ($_POST) {
	
   $doID = $_POST['doID'];

   $sql = "DELETE FROM thingsToDo WHERE doID = $doID";

    if($conn->query($sql) === TRUE) {
       echo "<p>Successfully deleted!</p>" ;
    
       echo "<a href='thingstodo.php'><button type='button'>Back to User Table</button></a>";
   } else {
       echo "Error updating record : " . $conn->error;
   }

   $conn->close();
}

?>