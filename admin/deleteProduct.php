<?php
session_start();

  include '../connectDB.php';

if (isset($_GET['id'])) {
   $id=$_GET['id'];



   $sql = "SELECT thumbnail from Products WHERE id_product='$id';";
   $result = $conn->query($sql);
   while($rowP = $result->fetch_assoc()) {
     $thumb = $rowP['thumbnail'];
   }

   $path = "uploads/".$thumb;
   unlink($path);


   $sql1 = "SELECT image from Productimage where productId='$id';";
   $result1 = $conn->query($sql1);


   while($rowImage = $result1->fetch_assoc()) {
     $ima = $rowImage['image'];
     $pathx = "uploads/".$ima;
     unlink($pathx);
   }



   // xoa trong bang image
   $query1 = "DELETE FROM Productimage WHERE productId = '$id';";
   $result_query1 = $conn->query($query1);



   $query_delete = "DELETE FROM Products WHERE id_product = '$id';";
   $result_delete = $conn->query($query_delete);




header('Location: ' . $_SERVER['HTTP_REFERER']);
}

else {
  header('Location: ../sign');
}
?>
