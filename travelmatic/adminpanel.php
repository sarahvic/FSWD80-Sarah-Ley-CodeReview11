<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if(!isset($_SESSION["admin"]) && !isset($_SESSION["user"])){
  header("Location: index1.php");
}

if(isset($_SESSION["user"])){
  header("Location: home.php");
}

"SELECT * FROM user WHERE userID=".$_SESSION['admin'];
$res=mysqli_query($conn, "SELECT * FROM user WHERE userID=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome Admin- <?php echo $userRow['firstName' ]; ?></title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Travel Vienna</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="thingstodo.php">Things To Do<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="restaurants.php">Restaurants<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="concerts.php">Concerts<span class="sr-only">(current)</span></a>
      </li>
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button type="button" class="btn btn-outline-secondary">Search</button>
    </form>
  </div>
</nav>


	<h5> Hi Admin <?php echo $userRow['firstName']. "!" ; ?> </h5>
           
    <a  href="logout.php?logout">Sign Out</a>

</body>
</html>

<?php ob_end_flush(); ?>