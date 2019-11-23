<?php
ob_start();
session_start(); 

if( isset($_SESSION['user'])!="" ){
 header("Location: home.php" ); 
}

if (isset($_SESION['admin'])!=""){
  header("Location: adminpanel.php");
}
include_once 'dbconnect.php';
$error = false;
if ( isset($_POST['btn-signup']) ) {
 
$fname = trim($_POST['firstName']);
$fname = strip_tags($fname);
$fname = htmlspecialchars($fname);

$lname = trim($_POST['lastName']);
$lname = strip_tags($lname);
$lname = htmlspecialchars($lname);

$email = trim($_POST['email']);
$email = strip_tags($email);
$email = htmlspecialchars($email);

$pass = trim($_POST['password']);
$pass = strip_tags($pass);
$pass = htmlspecialchars($pass);


//first name validation
if(empty($fname)){
	$error=true;
	$nameError= "Please enter your full first name";
} else if (strlen($fname) <3) {
	$error = true;
	$nameError="First name must have atleast 3 characters";
} else if (!preg_match("/^[a-zA-Z]+$/",$fname)) {
	$error=true;
	$nameError="First Name can only include alphabetical letters and spaces";
}

//last name validation
if(empty($lname)){
	$error=true;
	$nameError= "Please enter your full last name";
} else if (strlen($lname) <3) {
	$error = true;
	$nameError="last name must have at least 3 characters";
} else if (!preg_match("/^[a-zA-Z]+$/",$lname)) {
	$error=true;
	$nameError="Last name can only include alphabetical letters and spaces.";
}

//email validation
if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
	$error = true;
	$emailError= "Provided Email is already in use.";
}else{


//does email already exist?
$query = "SELECT email FROM user WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
if($count!=0){
	$error = true;
	$emailError = "Provided Email is already in use.";
}
}

//pass validation
if(empty($pass)){
	$error = true;
	$passError = "Please enter password.";
} else if(strlen($pass)< 6) {
	$error = true;
	$passError = "Password must have atleast 6 characters";
}

//pass hashing
$password = hash('sha256' , $pass);

//no error? okay sign up!
if(!$error) {

	$query = "INSERT INTO user (firstName, lastName, email, password) VALUES ('$fname', '$lname', '$email', '$password')";
	$res = mysqli_query($conn, $query);

	if($res){
		$errtype = "success";
		$errMSG = "Succesfully registered, you may login now!";
		unset ($fname);
		unset ($lname);
		unset ($email);
		unset ($pass);
	}else{
		$errType = "danger";
		$errMSG = "Something went wrong, try again later...";
	}
}

}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Register Page</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>

<!-- Register layout -->

<div class = "container" >

   <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  autocomplete="off" >
     
            <h2>Register.</h2>
            <hr/>
         
   <?php
   if ( isset($errMSG) ) {
 
   ?>
   <div  class="alert alert-<?php echo $errTyp ?>" >
   <?php echo  $errMSG; ?>
   </div>

<?php
}
?>

<input type="text" name="firstName" class="form-control" placeholder="Enter First Name" maxlength="50" value="<?php echo $fname ?>" />
<span class = "text-danger"><?php echo $nameError; ?></span>


<input type="text" name="lastName" class="form-control" placeholder="Enter Last Name" maxlength="50" value="<?php echo $lname ?>" />
<span class = "text-danger"><?php echo $nameError; ?></span>


<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="50" value="<?php echo $email ?>" />
<span class = "text-danger"><?php echo $emailError; ?></span>

<input type="password" name="password" class="form-control" placeholder="Enter Your Password" maxlength="15" />
<span class = "text-danger"><?php echo $passError; ?></span>
<hr/>


<!-- buttons -->
<button type="Submit" class = "btn btn-block btn-primary" name="btn-signup">Register</button>
<hr/>

<a href = "index1.php" >Sign in Here</a>

</form>
</div>
</body>
</html>

<?php  ob_end_flush(); ?>