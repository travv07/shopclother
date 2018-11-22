<?php include 'includes/header.php'; ?>

    <div id="wrapper">

      <!-- Sidebar -->
      <?php include 'includes/sidebar.php'; ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Users</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Table Example</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Full name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <td>Action</td>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    include '../connectDB.php';

                  //get users
                  $queryuser = "SELECT id, email_address, fullname, address FROM User";
                  $resultuser = $conn->query($queryuser);
                  if ($resultuser->num_rows > 0) {
                    // output data of each row
                    while($rowuser = $resultuser->fetch_assoc()) {
                      $id_user = $rowuser['id'];
                      $fullname = $rowuser['fullname'];
                      $email = $rowuser['email_address'];
                      $address = $rowuser['address'];
              ?>
              <tr>

                <td><?= $id_user; ?></td>
                <td><?= $fullname; ?></td>
                <td><?= $email; ?></td>
                <td><?= $address; ?></td>
                <td><a href="deleteuser.php?id=<?= $id_user; ?>">Delete</a></td>
              </tr>
              <?php }}  ?>
    
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

          <p class="small text-center text-muted my-5">
            <em>More table examples coming soon...</em>
          </p>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>

    <script src="assets/js/jquery/jquery.min.js"></script>
    <script src="assets/js/bootstrap-js/bootstrap.bundle.min.js"></script>

  </body>

</html>
