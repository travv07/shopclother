<?php
  session_start();
  if(isset($_POST['login'])) {
    $name = $_POST['useremail'];
    $userpassword = $_POST['userpassword'];

    include '../../connectDB.php';

    $query = "SELECT * FROM User WHERE email_address='{$name}' and password = '{$userpassword}'";
    $select_user_query = mysqli_query($conn, $query);

    if (!$select_user_query) {
      DIE("QUERY FAILED". mysqli_error($conn));
    }


    $row = mysqli_fetch_array($select_user_query);

    $db_id = $row['id'];
    $db_name = $row['email_address'];
    $db_password = $row['password'];
    $db_fname = $row['fullname'];
    $db_address = $row['address'];
    $db_job = $row['rule'];



    if ($name !== $db_name && $password !== $db_password) {
        $_SESSION['error'] = "Tài khoản hoặc mật khẩu sai";
        header("Location: ../sign_in.php");
    }
    elseif($db_job == 'admin'){

      $_SESSION['role'] = $db_job;
      $_SESSION['id'] = $db_id;
      $_SESSION['user'] = $db_name;
      $_SESSION['logged_in']= 'True';
      header("Location: ../index.php");

    }
    else{
      $_SESSION['id'] = $db_id;
      $_SESSION['user'] = $db_name;
      $_SESSION['logged_in']= 'True';
      header( "Location: index.php" );
    }
  }
 ?>
