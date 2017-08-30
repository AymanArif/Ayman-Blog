<?php require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/DB.php"); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/Sessions.php"); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/Functions.php"); ?>
<?php
global $conn;
if(isset($_GET["id"])){
    $IdFromURL=$_GET["id"];
    $ConnectingDB;
$Query="DELETE FROM registration WHERE id='$IdFromURL' ";
$Execute=$conn->query($Query);
if($Execute){
	$_SESSION["SuccessMessage"]="Admin Deleted Successfully";
	Redirect_to("Admins.php");
	}else{
	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
	Redirect_to("Admins.php");
		
	}
    
    
    
    
    
}

?>