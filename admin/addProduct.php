<?php
  if(isset($_POST['submit'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["i0"]["name"]);
    $target_file1 = $target_dir . basename($_FILES["i1"]["name"]);
    $target_file2 = $target_dir . basename($_FILES["i2"]["name"]);
    $target_file3 = $target_dir . basename($_FILES["i3"]["name"]);

    include '../connectDB.php';

    $image = $_FILES['i0']['name'];
    $image1 = $_FILES['i1']['name'];
    $image2 = $_FILES['i2']['name'];
    $image3 = $_FILES['i3']['name'];


    $name = $_POST['name'];
    $des = $_POST['des'];
    $price = $_POST['price'];
    $cate = $_POST['category'];

    // lay id cuoi cung cua product
    $queryMax = "SELECT MAX(id_product) AS lastId FROM Products;";
    $resultMax = $conn->query($queryMax);
    while($rowMax = $resultMax->fetch_assoc()) {
      $max = $rowMax['lastId'];
    }



    if (move_uploaded_file($_FILES["i0"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["i0"]["name"]). " has been uploaded.";
            $sql = "INSERT INTO Products(name, description,price,id_category,thumbnail)
            VALUES ('$name','$des', '$price','$cate', '$image');";
            $result = $conn->query($sql);

            $last_id =  mysqli_insert_id($conn);





        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        if (move_uploaded_file($_FILES["i1"]["tmp_name"], $target_file1)) {

                echo "The file ". basename( $_FILES["i1"]["name"]). " has been uploaded.";
                 $sql1 = "INSERT INTO Productimage(image, productId)
                 VALUES ('$image1','$last_id');";
                 $result1 = $conn->query($sql1);


        } else {
                echo "Sorry, there was an error uploading your file.";
        }



        if (move_uploaded_file($_FILES["i2"]["tmp_name"], $target_file2)) {

                echo "The file ". basename( $_FILES["i2"]["name"]). " has been uploaded.";
                 $sql2 = "INSERT INTO Productimage(image, productId)
                 VALUES ('$image2','$last_id');";

                 $result2 = $conn->query($sql2);
        } else {
                echo "Sorry, there was an error uploading your file.";
        }


        if (move_uploaded_file($_FILES["i3"]["tmp_name"], $target_file3)) {

                echo "The file ". basename( $_FILES["i3"]["name"]). " has been uploaded.";
                 $sql3 = "INSERT INTO Productimage(image, productId)
                 VALUES ('$image3','$last_id');";

                 $result3 = $conn->query($sql3);
        } else {
                echo "Sorry, there was an error uploading your file.";
        }

        // ------------------------- Category


        header("Location: products.php");


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


      <form method="post" action="addProduct.php" enctype="multipart/form-data">
        <div class="row">
          <div class="offset-md-3">

          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="name">Item Name</label>
              <input name="name" type="text" class="form-control" id="name" >
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input name="price" type="number" class="form-control" id="price" >
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
              <textarea class="form-control" rows="5" id="des" name="des"></textarea>
            </div>
          </div>
        </div>


        <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label for="i0">Thumbnail</label>
              <input name="i0" type="file" class="form-control-file" id="i0">
            </div>
            <div class="col-md-3">
              <label for="i1">Image 1</label>
              <input name="i1" type="file" class="form-control-file" id="i1">
            </div>
            <div class="col-md-3">
              <label for="i2">Image 2</label>
              <input name="i2" id="i2" type="file" class="form-control-file">
            </div>
            <div class="col-md-3">
              <label for="i3">Image 3</label>
              <input name="i3" id="i3" type="file" class="form-control-file">
            </div>
          </div>
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </form>
      </div>
        </div>
      </div>

<?php include 'includes/footer.php' ?>
