<?php
include('includes/header.php');
require('connection.inc.php');
require('functions.inc.php');
$msg='';
if(isset($_POST['submit'])){
	$username=get_safe_value($con,$_POST['username']);
	$password=get_safe_value($con,$_POST['password']);
	$sql="select * from admin where email='$username' and password='$password'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
		$_SESSION['ADMIN_LOGIN']='yes';
		$_SESSION['ADMIN_USERNAME']=$username;
		header('location:index.php');
		die();
	}else{
		$msg="Please enter correct login details";	
	}
	
}
?>
<!-- <!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body class="bg-dark"> -->
      <!-- <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150"> -->
                  <!-- <form method="post">
                     <div class="form-group">
                        <label>Username</label>
                        <input type="email" name="username" class="form-control" placeholder="Username" required>
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                     </div>
                     <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
					</form> -->
               <div class="container con">
                <div class="p-4">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                        <?php
                    if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                    {
                        echo '<h5 class="bg-danger text-white"> '.$_SESSION['status'].' </h5>';
                        unset($_SESSION['status']);
                    }
                ?>
               <form class="user" action="code.php" method="POST">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user"
                                placeholder="Email Address">
                        </div>
                        <div class="form-group">
                                <input type="password"  name="password" class="form-control form-control-user"
                                   placeholder="Password">
                        </div>
                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login
                        </button>
                    </form>
					<div class="field_error"><?php echo $msg?></div>
               </div>
            </div>
         </div>
      </div>
      <!-- <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
   </body>
</html> -->
<?php
     include('includes/script.php');
    //  include('includes/footer.php');
     ?>
