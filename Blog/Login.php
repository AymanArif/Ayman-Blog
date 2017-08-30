<?php require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/DB.php"); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/Sessions.php"); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/Functions.php"); ?>
<?php session_start() ?>
<?php
if(isset($_POST["Submit"])){
$Username=$_POST["Username"];
$Password=$_POST["Password"];
echo $Username;

if(empty($Username)||empty($Password)){
	$_SESSION["ErrorMessage"]="All Fields must be filled out";
	Redirect_to("Login.php");
	
}
else{
	$Found_Account=Login_Attempt($Username,$Password);
	echo "<script>console.log('dvbr');</script>";
	$_SESSION["User_Id"]=$Found_Account["id"];
	$_SESSION["Username"]=$Found_Account["username"];
	if($Found_Account){
	$_SESSION["SuccessMessage"]="Welcome  {$_SESSION["Username"]} ";
	Redirect_to("Dashboard.php");
		
	}else{
		
	$_SESSION["ErrorMessage"]="Invalid Username / Password";
	Redirect_to("Login.php");
	}
	
}	
}	


?>

<!DOCTYPE>

<html>
	<head>
		<title>Log-in</title>
                <link rel="stylesheet" href="../css/bootstrap.min.css">
                <script src="../js/jquery-3.2.1.min.js"></script>
                <script src="../js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../css/adminstyles.css">
<style>
	.FieldInfo{
    color: rgb(251, 174, 44);
    font-family: Bitter,Georgia,"Times New Roman",Times,serif;
    font-size: 1.2em;
}
body{
	background-color: #ffffff;
}

</style>
                
	</head>
	<body>
		<div style="height: 10px; background: #27aae1;"></div>
<nav class="navbar navbar-inverse" role="navigation">
	<div class="container">
		<div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
		data-target="#collapse">
		<span class="sr-only">Toggle Navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="Blog.php">
	   <img style="margin-top: -12px;" src="../images/jazebakramcom.png" width=200;height=30;>
	</a>
		</div>
		<div class="collapse navbar-collapse" id="collapse">
		
		</div>
		
	</div>
</nav>
<div class="Line" style="height: 10px; background: #27aae1;"></div>
<div class="container-fluid">
<div class="row">
	
	<div class="col-sm-offset-4 col-sm-4">
		<br><br><br><br>
		<?php echo Message();
	      echo SuccessMessage();
	?>
	<h2 style="background:#5bc0de; text-align:center; border-radius:20px;color:white; font-size:25px;line-height:2em;">Administrative Login</h2>
	
<div>
<form action="Login.php" method="post">
	<fieldset>
	<div class="form-group">
	<label for="Username"><span class="FieldInfo">UserName:</span></label>
	<div class="input-group input-group-lg">
	<span class="input-group-addon">
	<span class="glyphicon glyphicon-envelope text-primary"></span>
	</span>
	<input class="form-control" type="text" name="Username" id="Username" placeholder="Username">
	</div>	
	</div>
	
	<div class="form-group">
	<label for="Password"><span class="FieldInfo">Password:</span></label>
	<div class="input-group input-group-lg">
	<span class="input-group-addon">
	<span class="glyphicon glyphicon-lock text-primary"></span>
	</span>
	<input class="form-control" type="Password" name="Password" id="Password" placeholder="Password">
	</div>
	</div>
	
	<br>
<input class="btn btn-lg btn-info btn-block" type="Submit" name="Submit" value="Login">
	</fieldset>
	<br>
</form>
<a class="btn btn-lg btn-default btn-block" href="../userlogin/Login.php" >User Login</a>
<a class="btn btn-lg btn-success btn-block" href="../register/register.php" >Register</a>
<hr style=" height: 32px;
    border-style: solid;
    border-color: black;
    border-width: 1px 0 0 0;
    border-radius: 20px;margin-top:10px;margin-bottom:0px;">
        <a class="btn btn-lg btn-success btn-block" href="../Blog/Blog.php">Blog as Viewer</a>
	</div> <!-- Ending of Main Area-->
	
</div> <!-- Ending of Row-->
	
</div> <!-- Ending of Container-->

	    
	</body>
</html>