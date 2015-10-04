<?php
if (!isset($_POST['submit'])) 
{
die(header("Location: simpleForm.php"));
}
session_start();
$_SESSION['formAttempt']=true;
if (isset($_SESSION['error'])){
unset($_SESSION['error']);
}
$required=array("name","email","phone","password1","password2");
$_SESSION['error']=array();
foreach ($required as $value) {
if (!isset($_POST[$value]) || $_POST[$value]=="") {
$_SESSION['error'][]=$value." is required";
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