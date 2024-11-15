<?php
require('connection.inc.php');
require('functions.inc.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/searchbox.php');

if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}
// else{
// 	header('location:login.php');
// 	die();
// }
?>