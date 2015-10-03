<?php
if (!isset($_POST['submit'])) {
	die(header("Location:simpleForm.php"));
}
session_start();

$_SESSION['formAttempt']=true;
if (isset($_SESSION['error'])){
	unset($_SESSION['error']);
}

$_SESSION['error']=array();
$required=array("name","email","phone","password1","password2");

foreach ($required as $requiredValue) {
	if (($_POST[$required]=="") || (!isset($POST[$required]))){
	$_SESSION['error'][]=$requiredValue." is required";
	}
}
if((isset($_SESSION['error'])) && count($_SESSION['error']>0)){
	die(header("Location:simpleForm.php"));
}
else{
	unset($_SESSION['formAttempt']);
	die(header("Location:success.php"));
}