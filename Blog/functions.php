<?php

function get_real_ip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function check_ip($item_id) {
global $conn;
// $uid=$_SESSION['user_id']; :-add 1 parameter for session uid
$query = $conn->query("SELECT * FROM likes WHERE item_id='$item_id' AND user_id=2 LIMIT 1");
$likes = $query->num_rows;
return $likes;
} 

function likes($item_id) {
  global $conn;
$query = $conn->query("SELECT * FROM likes WHERE item_id='$item_id'");
$likes = $query->num_rows;
return $likes;
}