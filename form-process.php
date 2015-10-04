<?php
if (!isset($_POST['submit']) && $_SERVER['REQUEST_METHOD']=="POST")
{
die(header("Location: simpleForm.php"));
}
session_start();

$_SESSION['formAttempt']=true;
if (isset($_SESSION['error'])){
	unset($_SESSION['error']);
}
if (isset($_SESSION['input'])) {
	unset($_SESSION['input']);
}

$input=array("name","email","phone","password1","password2");
$_SESSION['input']=array();

foreach ($input as $value) {
	$_SESSION['input'][$value]=$_POST[$value];
}

$required=array("name","email","phone");
	$_SESSION['error']=array();
	foreach ($required as $value) {
	if (!isset($_SESSION['input'][$value]) || $_SESSION['input'][$value]=="") {
	$_SESSION['error'][$value."Err"]=$value." is required";
}
if ($_SESSION['input']['password1']=="") {
	$_SESSION['error']['password1Err']="Password is required";
}
if ($_SESSION['input']['password2']=="") {
	$_SESSION['error']['password2Err']="Password verification is required";
}
}
if(isset($_SESSION['error']) && count($_SESSION['error'])>0){
die(header("Location: simpleForm.php"));
}
else{
unset($_SESSION['formAttempt']);
die(header("Location: success.php"));
}
?>