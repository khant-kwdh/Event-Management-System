<?php
ob_start();
$page = basename($_SERVER['SCRIPT_NAME']);
?>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 my-2" id="sidenav-main" style="background-color: #3B308A;">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark position-absolute end-0 top-0 d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href="https://demos.creative-tim.com/material-dashboard/pages/dashboard" target="_blank">
        <span class="ms-1 text-sm" style="color: white;">Eventura</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2" >
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-dark <?= $page == 'index.php' ? 'active bg-gradient-primary' : ''; ?>" href="index.php">
            <i class="material-symbols-rounded" style="color: white;">dashboard</i>
            <span class="nav-link-text ms-1" style="color: white;">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-dark <?= $page == 'category.php' ? 'active bg-gradient-primary' : ''; ?>" href="category.php">
            <i class="material-symbols-rounded"  style="color: white;">table_view</i>
            <span class="nav-link-text ms-1"  style="color: white;">All Categories</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-dark <?= $page == 'add-category.php' ? 'active bg-gradient-primary' : ''; ?>" href="add-category.php">
            <i class="material-symbols-rounded"  style="color: white;">add</i>
            <span class="nav-link-text ms-1"  style="color: white;">Add Category</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-dark <?= $page == 'products.php' ? 'active bg-gradient-primary' : ''; ?>" href="products.php">
            <i class="material-symbols-rounded"  style="color: white;">table_view</i>
            <span class="nav-link-text ms-1"  style="color: white;">All Events</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-dark <?= $page == 'add-product.php' ? 'active bg-gradient-primary' : ''; ?>" href="add-product.php">
            <i class="material-symbols-rounded"  style="color: white;">add</i>
            <span class="nav-link-text ms-1"  style="color: white;">Add Events</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-dark <?= $page == 'orders.php' ? 'active bg-gradient-primary' : ''; ?>" href="orders.php">
            <i class="material-symbols-rounded"  style="color: white;">table_view</i>
            <span class="nav-link-text ms-1"  style="color: white;">Bookings</span>
          </a>
        </li>

        <!--<li class="nav-item">
          <a class="nav-link text-dark <?//= $page == 'login.php' ? 'active bg-gradient-primary' : ''; ?>" href="../login.php">
            <i class="material-symbols-rounded"  style="color: white;">login</i>
            <span class="nav-link-text ms-1" style="color: white;">Log In</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-dark <?//= $page == 'register.php' ? 'active bg-gradient-primary' : ''; ?>" href="../register.php">
        <i class="material-symbols-rounded"  style="color: white;">assignment</i>
            <span class="nav-link-text ms-1"  style="color: white;">Sign Up</span>
          </a>
        </li>-->

      </ul>
    </div>

    <div class="sidenav-footer position-absolute w-100 bottom-0">
      <div class="mx-3">
        <a class="btn w-100" style="background-color: #F0AF1A; color: black;" href="../logout.php">Log Out</a>
      </div>
    </div>
</aside>
