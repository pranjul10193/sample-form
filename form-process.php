<?php
if (!isset($_POST['submit']) && $_SERVER['REQUEST_METHOD']=="POST")
{
die(header("Location: simpleForm.php"));
}

session_start();
$_SESSION['script']="<!--<script type='text/javascript' src='form.js'></script>-->";
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
		else {
			if (($value=='name') && (!preg_match('/(?:^[A-Z][a-z]+$)/', $_SESSION['input'][$value]))){
				$_SESSION['error'][$value."Err"]=$value." is invalid.";
			}
			if (($value=='phone') && (!preg_match('/^[0-9]{4}-[0-9]{7}$/', $_SESSION['input'][$value]))){
				$_SESSION['error'][$value."Err"]=$value." is not valid";
			}
			if (($value=="email") && (!preg_match('/^[a-z_][a-z0-9]+(?:[-._][a-z0-9]+)*@[a-z]+(?:[-._][a-z0-9]+)*\.[a-z]+$/', $_SESSION['input'][$value]))){
				$_SESSION['error'][$value."Err"]=$value." is invalid";
			}
		}
	}
if ($_SESSION['input']['password1']=="") {
	$_SESSION['error']['password1Err']="Password is required";
}
if ($_SESSION['input']['password2']=="") {
	$_SESSION['error']['password2Err']="Password verification is required";
}
if ($_SESSION['input']['password2']!=$_SESSION['input']['password1']) {
	$_SESSION['error']['password2Err']="Password do not match";
}


if(isset($_SESSION['error']) && count($_SESSION['error'])>0){
die(header("Location: simpleForm.php"));
}
else{
unset($_SESSION['formAttempt']);
die(header("Location: success.php"));
}
?>