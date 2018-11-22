<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
  header('Location: sign_in.php');
}
 ?>

    <?php include 'includes/header.php'; ?>
     <div id="wrapper">
       <ul class="sidebar navbar-nav">
         <li class="nav-item active">
           <a class="nav-link" href="index.html">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span>
           </a>
         </li>
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-fw fa-folder"></i>
             <span>Pages</span>
           </a>
           <div class="dropdown-menu" aria-labelledby="pagesDropdown">
             <h6 class="dropdown-header">Login Screens:</h6>
             <a class="dropdown-item" href="login.html">Login</a>
             <a class="dropdown-item" href="register.html">Register</a>
             <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
             <div class="dropdown-divider"></div>
             <h6 class="dropdown-header">Other Pages:</h6>
             <a class="dropdown-item" href="404.html">404 Page</a>
             <a class="dropdown-item" href="blank.html">Blank Page</a>
           </div>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="charts.html">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Charts</span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="tables.html">
             <i class="fas fa-fw fa-table"></i>
             <span>Tables</span></a>
         </li>
       </ul>
       <div id="content-wrapper">
         <div class="container-fluid">

           <!-- Breadcrumbs-->
           <ol class="breadcrumb">
             <li class="breadcrumb-item">
               <a href="#">Dashboard</a>
             </li>
             <li class="breadcrumb-item active">Overview</li>
           </ol>

           <!-- Icon Cards-->

           <?php
                 include '../connectDB.php';

               $queryusers = "SELECT count(id) as total FROM User";
               $resultusers = $conn->query($queryusers);

               if($resultusers->num_rows > 0) {
                 while ($rowusers = $resultusers->fetch_assoc()) {
                   $totalusers = $rowusers['total'];
                 }
               }

               $queryfeedbacks = "SELECT count(id) as total FROM Feedback";
               $resultfeedbacks = $conn->query($queryfeedbacks);

               if($resultfeedbacks->num_rows > 0) {
                 while ($rowfeedbacks = $resultfeedbacks->fetch_assoc()) {
                   $totalfeedbacks = $rowfeedbacks['total'];
                 }
               }

               $queryproducts = "SELECT count(id_product) as total FROM Products";
               $resultproducts = $conn->query($queryproducts);

               if($resultproducts->num_rows > 0) {
                 while ($rowproducts = $resultproducts->fetch_assoc()) {
                   $totalproducts = $rowproducts['total'];
                 }
               }

          ?>

           <div class="row">
             <div class="col-xl-3 col-sm-6 mb-3">
               <div class="card text-white bg-primary o-hidden h-100">
                 <div class="card-body">
                   <div class="card-body-icon">
                     <i class="fas fa-fw fa-comments"></i>
                   </div>
                   <div class="mr-5"><?php echo $totalfeedbacks ?> New Feedback!</div>
                 </div>
                 <a class="card-footer text-white clearfix small z-1" href="#">
                   <span class="float-left">View Details</span>
                   <span class="float-right">
                     <i class="fas fa-angle-right"></i>
                   </span>
                 </a>
               </div>
             </div>
             <div class="col-xl-3 col-sm-6 mb-3">
               <div class="card text-white bg-warning o-hidden h-100">
                 <div class="card-body">
                   <div class="card-body-icon">
                     <i class="fas fa-fw fa-list"></i>
                   </div>
                   <div class="mr-5"><?php echo $totalusers; ?> Users!</div>
                 </div>
                 <a class="card-footer text-white clearfix small z-1" href="#">
                   <span class="float-left">View Details</span>
                   <span class="float-right">
                     <i class="fas fa-angle-right"></i>
                   </span>
                 </a>
               </div>
             </div>
             <div class="col-xl-3 col-sm-6 mb-3">
               <div class="card text-white bg-success o-hidden h-100">
                 <div class="card-body">
                   <div class="card-body-icon">
                     <i class="fas fa-fw fa-shopping-cart"></i>
                   </div>
                   <div class="mr-5">123 New Orders!</div>
                 </div>
                 <a class="card-footer text-white clearfix small z-1" href="#">
                   <span class="float-left">View Details</span>
                   <span class="float-right">
                     <i class="fas fa-angle-right"></i>
                   </span>
                 </a>
               </div>
             </div>
             <div class="col-xl-3 col-sm-6 mb-3">
               <div class="card text-white bg-danger o-hidden h-100">
                 <div class="card-body">
                   <div class="card-body-icon">
                     <i class="fas fa-fw fa-life-ring"></i>
                   </div>
                   <div class="mr-5"><?php echo $totalproducts; ?> Products!</div>
                 </div>
                 <a class="card-footer text-white clearfix small z-1" href="#">
                   <span class="float-left">View Details</span>
                   <span class="float-right">
                     <i class="fas fa-angle-right"></i>
                   </span>
                 </a>
               </div>
             </div>
           </div>
        <?php include 'includes/footer.php'; ?>
       </div>
     </div>

     <script src="assets/js/jquery/jquery.min.js"></script>
     <script src="assets/js/bootstrap-js/bootstrap.bundle.min.js"></script>
   </body>
 </html>
