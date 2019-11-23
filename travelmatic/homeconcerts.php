<!DOCTYPE html>
<html>
<head>
	<title>Concerts</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<a href="home.php"> 
<button type="button" class="btn btn-secondary">Back Home!</button></a>

<table class="table table-light table-striped table-hover">
  <thead class="thead-light">
    <tr>
    
      <th scope="col">Performer</th>
      <th scope="col">Event Date</th>
      <th scope="col">Event Time</th>
      <th scope="col">Ticket Price</th>
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

$myquery = "SELECT performer, eventDate, eventTime, ticketPrice, address, website, image, concertID FROM concert"; 
$gobutton=mysqli_query($conn, $myquery);
$fetchresults=mysqli_fetch_array($gobutton, MYSQLI_ASSOC);


if(mysqli_num_rows($gobutton) > 0)
{
 
 foreach($gobutton as $result)
 {
  echo 
    "<tr>
      <td>".$result["performer"]."</td>
      <td>".$result["eventDate"]."</td>
      <td>".$result["eventTime"]."</td>
      <td>".$result["ticketPrice"]."</td>
      <td>".$result["address"]."</td>
      <td>".$result["website"]."</td>
      <td>".$result["image"]."</td>
      
     
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
