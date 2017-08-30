<?php

require_once('Include/DB.php');


  $username = $_POST["Username"];
  


$usernamesql = "SELECT * FROM `registration` WHERE username='$username'";
$usernameres = $conn->query($usernamesql);
$count = $usernameres->num_rows;
if($count == 1){
echo  "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span> User Name Not Availabe";
}else{
echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span> User Name Availabe";
}

?>