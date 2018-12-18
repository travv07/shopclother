<?php


  include '../connectDB.php';

    $id = $_GET['id'];
    $querySelectProduct = "SELECT name,price, description FROM Products
    WHERE id_product = '$id';";
      $resultSelect = $conn->query($querySelectProduct);
      while($rowS=$resultSelect->fetch_assoc()) {
        $name = $rowS['name'];
        $price = $rowS['price'];
        $des= $rowS['description'];
      }

 ?>


<?php include 'includes/header.php' ?>
<div id="wrapper">
  <?php include 'includes/sidebar.php'; ?>
  <div id="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Products</li>
      </ol>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          <a href="#">Product Update!</a>
        </div>
        <div class="card-body">
          <form method="post" action="updateProduct.php" enctype="multipart/form-data">
            <div class="row">
              <div class="offset-md-3">
              <input type="hidden" name="id" value="<?= $id ?>">
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name">Item Name</label>
                  <input value="<?= $name ?>" name="name" type="text" class="form-control" id="name" >
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input value="<?= $price ?>" name="price" type="number" class="form-control" id="price" >
                </div>
                <div class="form-group">
                  <label for="category">Category</label>
                  <select name="category" class="form-control" id="category">
                    <?php
                    include '../connectDB.php';
                     $queryCategory = "SELECT id_category, category FROM Categorys;";
                     $resultCategory = $conn->query($queryCategory);
                     while($rowCate = $resultCategory->fetch_assoc()) {
                        $idCate = $rowCate['id_category'];
                        $valueCate = $rowCate['category'];
                     ?>
                      <option value="<?= $idCate ?>"><?= $valueCate ?></option>
                   <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="des">Description</label>
                  <textarea  class="form-control" rows="5" id="des" name="des"><?= $des ?></textarea>
                </div>

                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
        </form>
        </div>
      </div>
    </div>

<?php include 'includes/footer.php' ?>
