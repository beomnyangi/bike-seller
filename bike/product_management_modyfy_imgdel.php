<?php
  session_start();

  $ret['check'] = "check";

  $host_name = '127.0.0.1';
  $user_name = 'root';
  $password = 'gozldgkwlak!724';
  $dbName = 'goods_data';
  $tbName = 'goods_detail';

  $cart_id_value = $_SESSION['detail'];
  $image_check = $_POST["image_check"];

  $query = "UPDATE $dbName.$tbName SET $image_check = '' WHERE (`id` = $cart_id_value);";

  // mysql 접속
  $conn = mysqli_connect($host_name, $user_name, $password);

  // 데이터베이스 선택
  mysqli_select_db($conn, $dbName);

  // 쿼리 전송
  mysqli_query($conn, $query);
  $ret['check'] = $image_check;

  // mysql 종료
  mysqli_close($conn);

  // 페이지 이동
  //header("location: order_cart.php");
  echo json_encode($ret);

?>