<?php
require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/Functions.php"); 
require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/DB.php"); 
session_start();
console.log("yeah");
if(isset($_POST)) {
$item_id = abs(intval($_GET['item_id']));
//$uid = abs(intval($_SESSION['user_id']));
//$ip = get_real_ip();

$ViewQuery="SELECT * FROM admin_panel ORDER BY id desc LIMIT 0,3";}
		
		$Execute=$conn->query($ViewQuery) or die('Not working');

$query = $conn->query("SELECT * FROM likes WHERE item_id='$item_id' AND user_id=2 LIMIT 1");//add $uid:-if not previously likes
$check = $query->num_rows;

if ($check == 0) {
$datetime = time();
$add = $conn->query("INSERT INTO likes (item_id,user_id) VALUES ('$item_id',2)");//add $uid
if ($add) {
$check = $conn->query("SELECT item_id FROM likes WHERE item_id='$item_id'");
$number = $check->num_rows;
sleep(1);
echo 'Liked <span>'.$number.'</span>';
}
} else {//if previously liked
$delete=$conn->query("DELETE FROM likes WHERE user_id=2 AND item_id='$item_id' ");//add $uid
$check = $conn->query("SELECT item_id FROM likes WHERE item_id='$item_id'");
$number = $check->num_rows;
sleep(1);
echo 'Like <span>'.$number.'</span>';
}
} 
else {
echo 0;
}