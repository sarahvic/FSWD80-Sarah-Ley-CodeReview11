<?php

require_once 'dbconnect.php';

if ($_GET['id']) {
$doID = $_GET['id'];

$sql = "SELECT * FROM thingsToDo WHERE doID = $doID;";
$result = mysqli_query($conn, $sql);

$row = $result->fetch_assoc(); 

}

?>

<!DOCTYPE html>
<html>
<head>
  <title>update Things to do</title>
</head>
<body>


   <legend>Edit Things to do</legend>

  
           <!-- form for update -->
    <div class="container mt-5">

  <form action="a_updatething.php"  method="post">
       <table  cellspacing="0" cellpadding= "0">

<!-- form for update image -->
<form enctype="multipart/form-data" method="post">
<p>Name: <input type="text" name="name" value="<?php echo $row['name'] ?>"></p>
<p>Type: <input type="text" name="type" value="<?php echo $row['type'] ?>"></p>
<p>Description: <input type="text" name="description" value="<?php echo $row['description'] ?>"></p>
<p>Address: <input type="text" name="address" value="<?php echo $row['address'] ?>"></p>
<p>Website: <input type="text" name="website" value="<?php echo $row['website'] ?>"></p>
<p>Image: <input type="text" name="image" value="<?php echo $row['image'] ?>"></p>
<p><input type= "hidden" name= "doID" value= "<?php echo $row['doID']?>" ></p>
<p><button  type= "submit">Save Changes</button></p>
<p><a  href= "thingstodo.php"><button  type="button">Back</button></a></p>
       



</body>
</html>