<?php require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/DB.php"); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/Sessions.php"); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/Functions.php"); ?>
<?php
global $conn;
if(isset($_GET["id"])){
    $IdFromURL=$_GET["id"];
    $ConnectingDB;
$Query="DELETE FROM category WHERE id='$IdFromURL' ";
$Execute=$conn->query($Query);
if($Execute){
	$_SESSION["SuccessMessage"]="Category Deleted Successfully";
	Redirect_to("Categories.php");
	}else{
	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
	Redirect_to("Categories.php");
		
	}
    
    
    
    
    
}

?>