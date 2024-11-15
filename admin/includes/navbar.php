<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
<a class="sidebar-brand d-flex align-items-center justify-content-center" >
    <div class="sidebar-brand-icon rotate-n-15">
    </div>
    <div class="sidebar-brand-text mx-3"><img src="../images/logoplants.png" style=" width:180px; height:85px;"></div>
</a>
<!-- Divider -->
<hr class="sidebar-divider my-0">
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
           <span>Dashboard</span>
    </a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="Register.php">
       <i class="fa-solid fa-user"></i>
        <span>Admin Profile</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
    </div>
</li>
<hr class="sidebar-divider">
<li class="nav-item">
    <a class="nav-link" href="manage_categories.php">
        <i class="fa-solid fa-list"></i>
        <span>categories</span>
    </a>
</li>

<hr class="sidebar-divider"> 

<li class="nav-item">
    <a class="nav-link" href="categories.php">
        <i class="fa-solid fa-cart-shopping"></i>
        <span>All categories</span></a>
</li>

<hr class="sidebar-divider">

<li class="nav-item">
    <a class="nav-link" href="product.php">
        <i class="fa-brands fa-shopify"></i>
        <span>Products</span></a>
</li>
<hr class="sidebar-divider">

<li class="nav-item">
    <a class="nav-link" href="order.php">
        <i class="fa-solid fa-cart-shopping"></i>
        <span>Orders</span></a>
</li>
<hr class="sidebar-divider">

<li class="nav-item">
    <a class="nav-link" href="user.php">
        <i class="fa-regular fa-star"></i>
        <span>User</span></a>
</li>

<hr class="sidebar-divider">
<li class="nav-item">
    <a class="nav-link" href="Contact_us.php">
       <i class="fa-regular fa-message"></i>
        <span>Contact Us</span></a>
</li>

<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->



    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                   
                    <form action="logout.php" method="POST"> 
                        <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>
                    </form>
              
                </div>
            </div>
        </div>
    </div>
<?php
include('includes/script.php');

?>