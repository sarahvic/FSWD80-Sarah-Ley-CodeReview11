<?php
//fetch.php
session_start();
$connect = mysqli_connect("localhost", "root", "", "cr11_sarahley_travelmatic");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM item 
  WHERE name LIKE '".$search."%'
  OR price LIKE '%".$search."%'
 ";
}
else
{
 $query = "SELECT * FROM item ORDER BY itemID";

}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 
 while($value = mysqli_fetch_array($result))
 {
  echo "<li class='media mt-2'>
<img class='mr-3' width='140px' src='".$value["image"]."'>
<div class='media-body'>
      <h5 class='mt-0 mb-1'>" .$value["name"]."</h5>
      <p>". $value["price"]."</p>";
      if(isset($_SESSION["admin"])){
        echo "<a href='delete_market.php?id=".$value["itemID"]."'>delete</a> <br>
      <a href='update_market.php?id=".$value["itemID"]."'>update</a> <br>
      <br>";
      }
      echo "</div>
      </li><br><hr/>";
      
}
 }
else
{
 echo 'Data Not Found';
}

?>