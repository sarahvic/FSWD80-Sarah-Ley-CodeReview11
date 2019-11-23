<!DOCTYPE html>
<html>
<head>
	<title>Things to do</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<a href="adminpanel.php"> 
<button type="button" class="btn btn-secondary">Back Home!</button></a>

<a href="insertthing.php"> 
<button type="button" class="btn btn-secondary">Insert</button></a>

<table class="table table-light table-striped table-hover">
  <thead class="thead-light">
    <tr>
    
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Description</th>
      <th scope="col">Address</th>
      <th scope="col">Website</th>
      <th scope="col">Image</th>
      <th scope="col"></th>
    </tr>
  </thead>
<tbody>

<?php
ob_start();
session_start();
require_once 'dbconnect.php';

$myquery = "SELECT name, type, description, address, website, image, doID FROM thingsToDo"; 
$gobutton=mysqli_query($conn, $myquery);
$fetchresults=mysqli_fetch_array($gobutton, MYSQLI_ASSOC);


if(mysqli_num_rows($gobutton) > 0)
{
 
 foreach($gobutton as $result)
 {
  echo 
    "<tr>
      <td>".$result["name"]."</td>
      <td>".$result["type"]."</td>
      <td>".$result["description"]."</td>
      <td>".$result["address"]."</td>
      <td>".$result["website"]."</td>
      <td>".$result["image"]."</td>
      <td><a href='deletething.php?id=".$result["doID"]."'>delete</a>
      <a href='updatething.php?id=".$result["doID"]."'>update</a>
     
      </td>
      </tr>"
      ;
    
}
}
?>


</tbody>
</table>
</body>
</html>

