<?php
require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/DB.php"); 
require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/function.php"); 
require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/Sessions.php"); 
 if(isset($_SESSION['User_Id']))
{$uid=$_SESSION['User_Id'];

if(isset($_POST)) {
//$item_id = abs(intval($_SESSION["PostId"]));

global $PostId;

$item_id=$_SESSION["PostId"];
//$ip = get_real_ip();


$query = $conn->query("SELECT * FROM likes WHERE item_id='$item_id' AND user_id=$uid LIMIT 1");//add $uid:-if not previously likes
$check = $query->num_rows;

if ($check == 0) {
$datetime = time();
$add = $conn->query("INSERT INTO likes (item_id,user_id) VALUES ('$item_id','$uid')");//add $uid
if ($add) {
$check = $conn->query("SELECT item_id FROM likes WHERE item_id='$item_id'");
$number = $check->num_rows;

echo 'Liked <span>'.$number.'</span>';
}
} else {//if previously liked
$delete=$conn->query("DELETE FROM likes WHERE user_id='$uid' AND item_id='$item_id' ");//add $uid
$check = $conn->query("SELECT item_id FROM likes WHERE item_id='$item_id'");
$number = $check->num_rows;

echo 'Like <span>'.$number.'</span>';
}
}
} 
else {
echo 'Viewer cannot Like';
}