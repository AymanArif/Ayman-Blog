<?php require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/DB.php"); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/Sessions.php"); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/version_2/Include/Functions.php"); ?>
<?php
$_SESSION["User_Id"]=null;
session_destroy();
Redirect_to("Login.php");



?>