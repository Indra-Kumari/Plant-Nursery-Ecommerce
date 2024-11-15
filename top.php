<?php
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');
$wishlist_count=0;
$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}

$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();

if(isset($_SESSION['USER_LOGIN'])){
	$uid=$_SESSION['USER_ID'];
	
	if(isset($_GET['wishlist_id'])){
		$wid=get_safe_value($con,$_GET['wishlist_id']);
		mysqli_query($con,"delete from wishlist where id='$wid' and user_id='$uid'");
	}

	$wishlist_count=mysqli_num_rows(mysqli_query($con,"select product.name,product.image,product.price,product.mrp,wishlist.id from product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'"));
}

$script_name=$_SERVER['SCRIPT_NAME'];
$script_name_arr=explode('/',$script_name);
$mypage=$script_name_arr[count($script_name_arr)-1];

$meta_title="My Ecom Website";
$meta_desc="My Ecom Website";
$meta_keyword="My Ecom Website";
if($mypage=='product.php'){
	$product_id=get_safe_value($con,$_GET['id']);
	$product_meta=mysqli_fetch_assoc(mysqli_query($con,"select * from product where id='$product_id'"));
	$meta_title=$product_meta['meta_title'];
	$meta_desc=$product_meta['meta_desc'];
	$meta_keyword=$product_meta['meta_keyword'];
}if($mypage=='contact.php'){
	$meta_title='Contact Us';
}

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $meta_title?></title>
    <meta name="description" content="<?php echo $meta_desc?>">
	<meta name="keywords" content="<?php echo $meta_keyword?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcode.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
   
    <link rel="stylesheet" href="styles.css">
	<style>
	.htc__shopping__cart a span.htc__wishlist {
		background: #c43b68;
		border-radius: 100%;
		color: #fff;
		font-size: 9px;
		height: 17px;
		line-height: 19px;
		position: absolute;
		right: 18px;
		text-align: center;
		top: -4px;
		width: 17px;
	}
	</style>
</head>
<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
    <nav>
    <div class="navbar">
      <i class='bx bx-menu'></i>
      <div class="logo"><img src="images/logoplants.png" style=" width:200px; height:80px;"alt=""></div>
      <div class="nav-links">
        <div class="sidebar-logo">
          <span class="logo-name">CodingLab</span>
          <i class='bx bx-x' ></i>
        </div>
        <ul class="links">
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About Us</a></li>
          <li>
              <a href="categories.php">Products</a>
              <i class='bx bxs-chevron-down js-arrow arrow '></i>
              <ul class="js-sub-menu sub-menu">
                  <li><a href="categories.php">Outdoor Plants</a></li>
                  <li><a href="categories.php">Indoor Plants</a></li>
                  <li><a href="categories.php">Flowering Plants</a></li>
                  <li><a href="categories.php">Non Flowering Plants</a></li>
                  <li><a href="categories.php">Succulents Plants</a></li>
                  <li><a href="categories.php">Medicinal</a></li>
                </ul>
            </li>
            
            <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>
     <div class="icons d-flex">
     <div class="header__search search search__open">
           <a href="#"><i class="icon-magnifier icons"></i></a>
      </div>
      <div class="header__account">
                                                                        <?php if(isset($_SESSION['USER_LOGIN'])){
                                                                            echo '<a href="logout.php">Logout</a> <a href="my_order.php">My Order</a>';
                                                                        }else{
                                                                            echo '<a href="login.php"><i class="fa-regular fa-user" style=" font-size:20px; color:#135226;"></i></a>';
                                                                        }
                                                                        ?>
                                                                        
                                                                    </div>
                                                                    <div class="htc__shopping__cart">
                                                                        <?php
                                                                        if(isset($_SESSION['USER_ID'])){
                                                                        ?>
                                                                        <a href="wishlist.php"><i class="icon-heart icons"></i></a>
                                                                        <a href="wishlist.php"><span class="htc__wishlist"><?php echo $wishlist_count?></span></a>
                                                                        <?php } ?>
                                                                        <a href="cart.php"><i class="icon-handbag icons"></i></a>
                                                                        <a href="cart.php"><span class="htc__qua"><?php echo $totalProduct?></span></a>
                                                                    </div>
     </div>
      <!-- <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
              <div class="input-box">
          <input type="text" placeholder="Search...">
        </div> -->
      </div>
    </div>
  </nav>
      	<div class="body__overlay"></div>
		<div class="offset__wrapper">
            <div class="search__area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search__inner">
                                <form action="search.php" method="get">
                                    <input placeholder="Search here... " type="text" name="str">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid htg p-0" >
          <img src="images/bloom.png" alt="">
         </div>