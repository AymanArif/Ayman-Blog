<?php echo getcwd();require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/DB.php"); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/Sessions.php"); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/Functions.php"); ?>
<?php session_start() ?> 
<?php Confirm_Login(); ?>
<?php
if(isset($_POST["Submit"])){
$Title=mysql_real_escape_string($_POST["Title"]);
$Category=mysql_real_escape_string($_POST["Category"]);
$Post=mysql_real_escape_string($_POST["Post"]);
date_default_timezone_set("Asia/Karachi");
$CurrentTime=time();
//$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
$DateTime;
$Admin=$_SESSION["Username"];
$Image=$_FILES["Image"]["name"];
$Target="Upload/".basename($_FILES["Image"]["name"]);
if(empty($Title)){
	$_SESSION["ErrorMessage"]="Title can't be empty";
	Redirect_to("AddNewPost.php");
	
}elseif(strlen($Title)<2){
	$_SESSION["ErrorMessage"]="Title Should be at-least 2 Characters";
	Redirect_to("AddNewPost.php");
	
}else{
	global $ConnectingDB;
	global $conn;
	$Query="INSERT INTO admin_panel(datetime,title,category,author,image,post)
	VALUES('$DateTime','$Title','$Category','$Admin','$Image','$Post')";
	$Execute=$conn->query($Query);
	move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
	if($Execute){
	$_SESSION["SuccessMessage"]="Post Added Successfully";
	Redirect_to("AddNewPost.php");
	}else{
	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
	Redirect_to("AddNewPost.php");
		
	}
	
}	
	
}

?>

<!DOCTYPE>

<html>
	<head>
		<title>Add New Post</title>
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
		<ul class="nav navbar-nav">
			<li><a href="#">Home</a></li>
			<li class="active"><a href="Blog.php" target="_blank">Blog</a></li>
			<li><a href="#">About Us</a></li>
			<li><a href="#">Services</a></li>
			<li><a href="#">Contact Us</a></li>
			<li><a href="#">Feature</a></li>
		</ul>
		<form action="Blog.php" class="navbar-form navbar-right">
		<div class="form-group">
		<input type="text" class="form-control" placeholder="Search" name="Search" >
		</div>
	         <button class="btn btn-default" name="SearchButton">Go</button>
			
		</form>
		</div>
		
	</div>
</nav>
<div class="Line" style="height: 10px; background: #27aae1;"></div>
<div class="container-fluid">
<div class="row">
	
	<div class="col-sm-2">
	<br><br>
	<ul id="Side_Menu" class="nav nav-pills nav-stacked">
	<li ><a href="Dashboard.php">
	<span class="glyphicon glyphicon-th"></span>
	&nbsp;Dashboard</a></li>
	<li class="active"><a href="AddNewPost.php">
	<span class="glyphicon glyphicon-list-alt"></span>
	&nbsp;Add New Post</a></li>
	<li><a href="Categories.php">
	<span class="glyphicon glyphicon-tags"></span>
	&nbsp;Categories</a></li>
	<li><a href="Admins.php">
	<span class="glyphicon glyphicon-user"></span>
	&nbsp;Manage Admins</a></li>
	<li ><a href="Comments.php">
	<span class="glyphicon glyphicon-comment"></span>
	&nbsp;Comments</a></li>
	<li><a href="Blog.php?Page=1" target="_Blank">
	<span class="glyphicon glyphicon-equalizer"></span>
	&nbsp;Live Blog</a></li>
	<li><a href="Logout.php">
	<span class="glyphicon glyphicon-log-out"></span>
	&nbsp;Logout</a></li>	
		
	</ul>
	
	
	
	
	</div> <!-- Ending of Side area -->
	<div class="col-sm-10">
	<h1>Add New Post</h1>
	<?php echo Message();
	      echo SuccessMessage();
	?>
<div>
<form action="AddNewPost.php" method="post" enctype="multipart/form-data">
	<fieldset>
	<div class="form-group">
	<label for="title"><span class="FieldInfo">Title:</span></label>
	<input class="form-control" type="text" name="Title" id="title" placeholder="Title">
	</div>
	<div class="form-group">
	<label for="categoryselect"><span class="FieldInfo">Category:</span></label>
	<select class="form-control" id="categoryselect" name="Category" >
	<?php
global $ConnectingDB;
global $conn;
$ViewQuery="SELECT * FROM category ORDER BY id desc";
$Execute=$conn->query($ViewQuery);
while($DataRows=$Execute->fetch_array()){
	$Id=$DataRows["id"];
	$CategoryName=$DataRows["name"];
?>	
	<option><?php echo $CategoryName; ?></option>
	<?php } ?>
			
	</select>
	</div>
	<div class="form-group">
	<label for="imageselect"><span class="FieldInfo">Select Image:</span></label>
	<input type="File" class="form-control" name="Image" id="imageselect">
	</div>
	<div class="form-group">
	<label for="postarea"><span class="FieldInfo">Post:</span></label>
	<textarea class="form-control" name="Post" id="postarea"></textarea>
	<br>
<input class="btn btn-success btn-block" type="Submit" name="Submit" value="Add New Post">
	</fieldset>
	<br>
</form>
</div>



	</div> <!-- Ending of Main Area-->
	
</div> <!-- Ending of Row-->
	
</div> <!-- Ending of Container-->
<div id="Footer">
<hr><p>Theme By | Jazeb Akram |&copy;2016-2020 --- All right reserved.
</p>
<a style="color: white; text-decoration: none; cursor: pointer; font-weight:bold;" href="http://jazebakram.com/coupons/" target="_blank">
<p>
This site is only used for Study purpose jazebakram.com have all the rights. no one is allow to distribute
copies other then <br>&trade; jazebakram.com &trade;  Udemy ; &trade; Skillshare ; &trade; StackSkills</p><hr>
</a>
	
</div>
<div style="height: 10px; background: #27AAE1;"></div> 

	    
	</body>
</html>