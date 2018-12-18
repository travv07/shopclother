<?php
session_start();

  include '../connectDB.php';

if (isset($_GET['id'])) {
   $id=$_GET['id'];

   $query_delete = "DELETE FROM User WHERE id = '$id'";
   $result_delete = $conn->query($query_delete);

   $query_delete2 = "DELETE FROM Orders WHERE id = '$id'";
   $result_delete2 = $conn->query($query_delete2);

header('Location: ' . $_SERVER['HTTP_REFERER']);
}

else {
  header('Location: ../sign');
}
?>
