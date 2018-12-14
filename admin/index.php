<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
  header('Location: sign_in.php');
}
 ?>

    <?php include 'includes/header.php'; ?>
     <div id="wrapper">
       <?php include 'includes/sidebar.php' ?>
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


               $queryOrders = "SELECT count(id) as total From Orders";
               $resultOrders = $conn->query($queryOrders) ;



              if($resultOrders->num_rows > 0) {
                while($rowOrders = $resultOrders->fetch_assoc()) {
                  $totalOrders = $rowOrders['total'];
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
                 <a class="card-footer text-white clearfix small z-1" href="allusers.php">
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
                   <div class="mr-5"><?php echo $totalOrders; ?> New Orders!</div>
                 </div>
                 <a class="card-footer text-white clearfix small z-1" href="orders.php">
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
                 <a class="card-footer text-white clearfix small z-1" href="products.php">
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
