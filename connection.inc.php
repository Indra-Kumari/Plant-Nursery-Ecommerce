<?php
session_start();
// $con=mysqli_connect("localhost","root","","ecomm");
//  define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/eCom/');
//  define('SITE_PATH','http://127.0.0.1/eCom/');
//  define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
//  define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');
// Establish a connection to the MySQL database
$con = mysqli_connect("localhost", "root", "", "ecomm");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
define('SERVER_PATH', $_SERVER['DOCUMENT_ROOT'].'/eCom/');
define('SITE_PATH', 'http://127.0.0.1/eCom/');
define('PRODUCT_IMAGE_SERVER_PATH', SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH', SITE_PATH.'media/product/');
?>

