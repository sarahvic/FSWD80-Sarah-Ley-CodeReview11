<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if ( isset($_SESSION['user' ])) {
 header("Location: home.php");
 
}
if (isset($_SESION['admin'])){
  header("Location: adminpanel.php");
}

$error = false;

if(isset($_POST['btn-login'])) {

 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST[ 'password']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if (empty($pass)){
  $error = true;
  $passError = "Please enter your password." ;
 }

 if(!$error){
 	
 	$password = hash('sha256', $pass);
 	$sql = "SELECT userID, firstName, lastName, email, password, status FROM user WHERE email='$email'";
 	$res=mysqli_query($conn, $sql);
 	$row=mysqli_fetch_array($res, MYSQLI_ASSOC);
 	$count = mysqli_num_rows($res);

 	if( $count == 1 && $row['password' ]==$password ) {
    if($row["status"] == "admin"){
      $_SESSION["admin"]= $row["userID"];
      header("Location: adminpanel.php");
    }else {
      $_SESSION["user"] = $row["userID"];
   header( "Location: home.php");
    }
   
  } else {
   $errMSG = "Incorrect Credentials, Try again..." ;
  }
 
 }

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>

<div class = "container" >
   <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off">
 
   
            <h2>Sign In.</h2>
            <hr/>
           
  <?php
if ( isset($errMSG) ) {
echo  $errMSG; ?>
             
               <?php
  }
  ?>

<input type="email" name="email"  class="form-control" placeholder= "Your Email" value="<?php echo $email; ?>"  maxlength="40" required />
       
<span class="text-danger"><?php  echo $emailError; ?></span>
 
         
<input  type="password" name="password"  class="form-control" placeholder ="Your Password" maxlength="15"  />
       
<span  class="text-danger"><?php  echo $passError; ?></span>
            
            <hr/>

<!-- buttons -->
<button  type="submit" name= "btn-login">Sign In</button>
         
         
            <hr/>
 
<a href="register1.php">Sign Up Here...</a>
     
         
   </form>
   </div>
</div>
</div>
</body>
</html>

<?php ob_end_flush(); ?>