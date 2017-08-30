
<?php require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/DB.php"); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/Sessions.php"); ?>
<?php
function Redirect_to($New_Location){
    header("Location:".$New_Location);
	exit;
}

function Login_Attempt($Username,$Password){
    $ConnectingDB;
    global $conn;
    $Query="SELECT * FROM registration
    WHERE username='$Username' AND password='$Password'";
    $Execute=$conn->query($Query);
    if($admin=$Execute->fetch_assoc()){
	return $admin;
    }else{
	return null;
    }
}
function Login(){
    if(isset($_SESSION["User_Id"])){
	return true;
    }
}
 function Confirm_Login(){
    if(!Login()){
	$_SESSION["ErrorMessage"]="Login Required ! ";
	Redirect_to("Login.php");
    }
    
 }




?>