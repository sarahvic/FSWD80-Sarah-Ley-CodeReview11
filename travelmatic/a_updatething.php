<?php 

require_once 'dbconnect.php';

if ($_POST) {
   $name = $_POST['name'];
   $type = $_POST['type'];
   $description = $_POST[ 'description'];
   $address = $_POST[ 'address'];
   $website = $_POST[ 'website'];
   $image = $_POST[ 'image'];

   $doID = $_POST['doID'];

    $sql = "UPDATE thingsToDo SET name = '$name', type = '$type', description = '$description', address = '$address', website = '$website', image = '$image'  WHERE doID = $doID;";

   if($conn->query($sql) === TRUE) {
       echo  "<p>Successfully Updated</p>";
       echo "<a href='a_updatething.php?id=" .$doID."'><button type='button'>Back</button></a>";
       echo  "<a href='thingstodo.php'><button type='button'>Back</button></a>";
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}

?>