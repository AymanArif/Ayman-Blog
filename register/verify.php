<?php
require_once('include/connect.php');

$key = $_GET['key'];
$id = $_GET['id'];
$sql = "SELECT * FROM `registration` WHERE id='$id' AND verification_key='$key' AND active=0";
$result = $conn->query($sql);

$count = $result->num_rows;
if($count ==1)
{   
    echo $usql = "UPDATE `registration` SET active=1 WHERE id='$id' ";
    echo $ures = $conn->query($usql);
    if($ures)
    {
        $smsg='Account activated';
    }
    else
    $fmsg = 'Account activation failed. Contact support.';
    
}
else
{
    $fmsg = 'Key not found in database';
}
        
?>
<html>
<head>
<title>User registration script in PHPs</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="css/styles.css" >

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
     
</div>
</body>
</html>