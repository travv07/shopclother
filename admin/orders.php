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
                  <th>User name</th>
                  <th>Email User</th>
                  <th>Address</th>
                  <th>Product Name</th>
                  <th>Price</th>
                  <td>Quantity</td>
                  <td>Total</td>
                  <td>Order date</td>
                  <td>Action</td>
                </tr>
              </thead>

              <tbody>
                <?php
                include '../connectDB.php';


              $queryOrder =
              "SELECT O.id, U.fullname, U.email_address, U.address, P.name , P.price, quality, P.price * quality as total, O.created_at  FROM Orderdetail INNER JOIN Orders O on Orderdetail.id_order = O.id
INNER JOIN User U on O.id_user = U.id INNER JOIN Products P on Orderdetail.id_product = P.id_product
";
              $resultOrder = $conn->query($queryOrder);
              if ($resultOrder->num_rows > 0) {
                // output data of each row
                while($rowO = $resultOrder->fetch_assoc()) {
                  $id = $rowO['id'];
                  $name_p = $rowO['fullname'];
                  $email = $rowO['email_address'];
                  $address = $rowO['address'];
                  $item_name = $rowO['name'];
                  $price = $rowO['price'];
                  $quantity = $rowO['quality'];
                  $total = $rowO['total'];
                  $order_date = $rowO['created_at'];

              ?>
              <tr>

              <td><?= $name_p ; ?></td>
              <td><?= $email; ?></td>
              <td><?= $address ;?></td>
              <td><?= $item_name; ?></td>
              <td><?= $price; ?></td>
              <td><?= $quantity; ?></td>
              <td><?= $total; ?></td>
              <td><?= $order_date; ?></td>

              <td>
                <a href="deleteOrder.php?id=<?= $id; ?>">Delete</a>


              </td>
              </tr>
              <?php }}  ?>

              </tbody>
              </table>
              </div>
            </div>
          </div>

<?php include 'includes/footer.php' ?>
