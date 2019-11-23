<?php 

require_once 'dbconnect.php';

if ($_POST) {
   $name = $_POST['name'];
   $type = $_POST['type'];
   $description = $_POST[ 'description'];
   $address = $_POST['address'];
   $website = $_POST['website'];
   $image = $_POST[ 'image'];

   $sql = "INSERT INTO thingsToDo (name, type, description, address, website, image) VALUES ('$name', '$type', '$description', '$address', '$website', '$image')";
    if($conn->query($sql) === TRUE) {
       echo "<p>New Record Successfully Created</p>" ;
    
        echo "<a href='thingstodo.php'><button type='button'>Home</button></a>";
   } else  {
       echo "Error " . $sql . ' ' . $conn->connect_error;
   }

   $conn->close();
}

?>