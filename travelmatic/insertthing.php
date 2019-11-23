


<!DOCTYPE html>
<html>
<head>
	<title>Insert Thing</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>

<form  action="a_insertthing.php" method= "post">
       <table cellspacing= "0" cellpadding="0">
           <tr>
               <th>Name</th>
               <td><input  type="text" name="name"  placeholder="Name" /></td>
           </tr>    
           <tr>
               <th>Type</th>
               <td><input  type="text" name= "type" placeholder="Type" /></td>
           </tr>
           <tr>
               <th>Description</th>
               <td><input type="text"  name="description" placeholder ="Description" /></td>
           </tr>
           <tr>
               <th>Address</th>
               <td><input  type="text" name="address"  placeholder="Address" /></td>
           </tr>    
           <tr>
               <th>Website</th>
               <td><input  type="text" name= "website" placeholder="Website" /></td>
           </tr>
           <tr>
               <th>Image</th>
               <td><input type="text"  name="image" placeholder ="Image" /></td>
           </tr>
           <tr>
               <td><button type ="submit">Insert Tip</button></td>
               <td><a href= "thingstodo.php"><button  type="button">Back</button></a></td>
           </tr>
       </table>
   </form>

</fieldset>

</body>
</html>
