<?php
session_start();

  include '../connectDB.php';

if (isset($_GET['id'])) {
   $id=$_GET['id'];

   $query_delete = "DELETE FROM Feedback WHERE id = '$id'";
   $result_delete = $conn->query($query_delete);



header('Location: ' . $_SERVER['HTTP_REFERER']);
}

else {
  header('Location: ../sign');
}
?>
