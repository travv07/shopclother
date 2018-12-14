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
          <a href="addProduct.php">Create New Product</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Product Name</th>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Price</th>
                  <td>Image</td>
                  <td>Action</td>
                </tr>
              </thead>

              <tbody>
                <?php
                include '../connectDB.php';


              $queryProduct =
              "SELECT id_product, name, C.category as cate, description, price, thumbnail
              FROM Products inner join Categorys C on Products.id_category = C.id_category";
              $resultProduct = $conn->query($queryProduct);
              if ($resultProduct->num_rows > 0) {
                // output data of each row
                while($rowProduct = $resultProduct->fetch_assoc()) {
                  $id_p = $rowProduct['id_product'];
                  $name_p = $rowProduct['name'];
                  $cate_p = $rowProduct['cate'];
                  $description_p = $rowProduct['description'];
                  $price_p = $rowProduct['price'];
                  $image_p = $rowProduct['thumbnail']
              ?>
              <tr>

              <td><?= $id_p; ?></td>
              <td><?= $name_p; ?></td>
              <td><?= $cate_p ;?></td>
              <td><?= $description_p; ?></td>
              <td><?= $price_p; ?></td>
              <td> <img width="100" src="uploads/<?= $image_p;?>" alt="<?= $image_p; ?>"></td>
              <td>
                <a href="deleteProduct.php?id=<?= $id_p; ?>">Delete</a> |
            
                <a href="editProduct.php?id=<?= $id_p; ?>">Edit</a>
              </td>
              </tr>
              <?php }}  ?>

              </tbody>
              </table>
              </div>
            </div>
          </div>

<?php include 'includes/footer.php' ?>
