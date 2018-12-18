<?php include 'includes/header.php' ?>
<div id="wrapper">
  <!-- Sidebar -->
  <?php include 'includes/sidebar.php'; ?>
  <div id="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Products</li>
      </ol>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          <a href="addProduct.php">Orders</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Message</th>
                  <th>Name</th>
                  <th>Phone Number</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                <?php
                include '../connectDB.php';


              $queryFeedback =
              "SELECT Feedback.id, message, name, number_phone, email FROM Feedback INNER JOIN User U on Feedback.user_id = U.id;
";
              $resultFeedback = $conn->query($queryFeedback);
              if ($resultFeedback->num_rows > 0) {
                // output data of each row
                while($rowO = $resultFeedback->fetch_assoc()) {
                  $id = $rowO['id'];
                  $message = $rowO['message'];
                  $name = $rowO['name'];
                  $phone = $rowO['number_phone'];
                  $email = $rowO['email'];
              ?>
              <tr>
              <td><?= $message ; ?></td>
              <td><?= $name; ?></td>
              <td><?= $phone ;?></td>
              <td><?= $email; ?></td>
              <td>
                <a href="deleteFeedback.php?id=<?= $id; ?>">Delete</a>
              </td>
              </tr>
              <?php }}  ?>
              </tbody>
              </table>
              </div>
            </div>
          </div>
<?php include 'includes/footer.php' ?>
