<?php require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/DB.php"); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/Sessions.php"); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/Functions.php"); ?>

<?php Confirm_Login(); ?>
<!DOCTYPE>

<html>
	<head>
		<title>Admin Dashboard</title>
                <link rel="stylesheet" href="../css/bootstrap.min.css">
                <script src="../js/jquery-3.2.1.min.js"></script>
                <script src="../js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../css/adminstyles.css">
<style>
	th{
	color:black;
	background-color: #ede9ed;
	
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
	<li class="active">
	<a href="Dashboard.php">
	<span class="glyphicon glyphicon-th"></span>
	&nbsp;Dashboard</a></li>
	<li><a href="AddNewPost.php">
	<span class="glyphicon glyphicon-list-alt"></span>
	&nbsp;Add New Post</a></li>
	<li><a href="Categories.php">
	<span class="glyphicon glyphicon-tags"></span>
	&nbsp;Categories</a></li>
	<li><a href="Admins.php">
	<span class="glyphicon glyphicon-user"></span>
	&nbsp;Manage Admins</a></li>
	<li><a href="Comments.php">
	<span class="glyphicon glyphicon-comment"></span>
	&nbsp;Comments
<?php
$ConnectingDB;
global $conn;
$QueryTotal="SELECT COUNT(*) FROM comments WHERE status='OFF'";
$ExecuteTotal=$conn->query($QueryTotal);
$RowsTotal=$ExecuteTotal->fetch_array();
$Total=array_shift($RowsTotal);
if($Total>0){
?>
<span class="label pull-right label-warning">
<?php echo $Total;?>
</span>
		
<?php } ?>
	</a>	
	</li>
	<li><a href="Blog.php?Page=1" target="_Blank">
	<span class="glyphicon glyphicon-equalizer"></span>
	&nbsp;Live Blog</a></li>
	<li><a href="Logout.php">
	<span class="glyphicon glyphicon-log-out"></span>
	&nbsp;Logout</a></li>	
		
	</ul>
	
	
	
	
	</div> <!-- Ending of Side area -->
	<div class="col-sm-10"> <!--Main Area-->
	<h1>Admin Dashboard</h1>
	
	<div><?php echo Message();
	      echo SuccessMessage();
	?></div>	
	
<div class="table-responsive">
	<table class="table table-striped table-hover">
		<tr>
			<th>No</th>
			<th>Post Title</th>
			<th>Date &Time</th>
			<th>Author</th>
			<th>Category</th>
			<th>Banner</th>
			<th>Comments</th>
			<th>Action</th>
			<th>Details</th>
			
		</tr>
<?php
$ConnectingDB;
global $conn;
$ViewQuery="SELECT * FROM admin_panel ORDER BY id desc;";
$Execute=$conn->query($ViewQuery);
$SrNo=0;
while($DataRows=$Execute->fetch_array()){
	$Id=$DataRows["id"];
	$DateTime=$DataRows["datetime"];
	$Title=$DataRows["title"];
	$Category=$DataRows["category"];
	$Admin=$DataRows["author"];
	$Image=$DataRows["image"];
	$Post=$DataRows["post"];
	$SrNo++;
	?>
	<tr>
		
	<td><?php echo $SrNo; ?></td>
	<td style="color: #5e5eff;"><?php
	if(strlen($Title)>19){$Title=substr($Title,0,19).'..';}
	echo $Title;
	?></td>
	<td><?php
	if(strlen($DateTime)>12){$DateTime=substr($DateTime,0,12);}
	echo $DateTime;
	?></td>
	<td><?php
	if(strlen($Admin)>9){$Admin=substr($Admin,0,9);}
	echo $Admin; ?></td>
	<td><?php
	if(strlen($Category)>10){$Category=substr($Category,0,10);}
	echo $Category;
	?></td>
	<td><img src="Upload/<?php echo $Image; ?>" width="170px"; height="50px"></td>
	<td>
<?php
$ConnectingDB;
global $conn;
$QueryApproved="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$Id' AND status='ON'";
$ExecuteApproved=$conn->query($QueryApproved);
$RowsApproved=$ExecuteApproved->fetch_array();
$TotalApproved=array_shift($RowsApproved);
if($TotalApproved>0){
?>
<span class="label pull-right label-success">
<?php echo $TotalApproved;?>
</span>
		
<?php } ?>

<?php
$ConnectingDB;
global $conn;
$QueryUnApproved="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$Id' AND status='OFF'";
$ExecuteUnApproved=$conn->query($QueryUnApproved);
$RowsUnApproved=$ExecuteUnApproved->fetch_array();
$TotalUnApproved=array_shift($RowsUnApproved);
if($TotalUnApproved>0){
?>
<span class="label  label-danger">
<?php echo $TotalUnApproved;?>
</span>
		
<?php } ?>
		
		
	</td>
	<td>
	<a href="EditPost.php?Edit=<?php echo $Id; ?>">
	<span class="btn btn-warning">Edit</span>
	</a>
	<a href="DeletePost.php?Delete=<?php echo $Id; ?>">
	<span class="btn btn-danger">Delete</span>
	</a>
	</td>
	<td>
	<a href="FullPost.php?id=<?php echo $Id; ?>" target="_blank">
	<span class="btn btn-primary"> Live Preview</span>
	</a>
	</td>
	</tr>
	
	
<?php } ?>






	</table>
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