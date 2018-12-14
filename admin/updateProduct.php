<?php




  include '../connectDB.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $des = $_POST['des'];
    $price = $_POST['price'];
    $cate = $_POST['category'];


    $queryUpdateProduct = "UPDATE Products SET name='$name',description='$des',price='$price',
     id_category = '$cate' where id_product = '$id';";

      $resultUpdate = $conn->query($queryUpdateProduct);

      header("Location: products.php");

 ?>
