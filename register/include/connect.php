<?php
$conn = new mysqli('localhost', 'root', '',"jazeb");//change demo when copying
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}
?>