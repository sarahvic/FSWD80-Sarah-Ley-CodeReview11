<?php 

require_once 'dbconnect.php';

if (isset($_GET['id'])) {
   $doID = $_GET['id'];

  $sql = "SELECT * FROM thingsToDo WHERE doID = $doID;" ; 
   $result = mysqli_query($conn, $sql);

   $data = $result->fetch_assoc();

   $conn->close();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete User</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>


<body>



<h3>Do you really want to delete this?</h3>
<form action ="a_deletething.php" method="post">

   <input type="hidden" name= "doID" value="<?php echo $data['doID'] ?>" />
   <button type="submit">Yes, delete it!</button >
   <a href="thingstodo.php"><button type="button">No, go back!</button></a>
</form>



</body>
</html>

<?php
}
?>