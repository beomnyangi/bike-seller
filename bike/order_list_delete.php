<?php
  $host_name = '127.0.0.1';
  $user_name = 'root';
  $password = 'gozldgkwlak!724';
  $dbName = 'user_data';
  $tbName = 'user_order';

  $id = $_POST["id"];
      
  $query = "DELETE FROM $dbName.$tbName WHERE (`id` = $id);";

  // mysql 접속
  $conn = mysqli_connect($host_name, $user_name, $password);

  // 데이터베이스 선택
  mysqli_select_db($conn, $dbName);

  // 쿼리 전송
  $result = mysqli_query($conn, $query);

  // mysql 종료
  mysqli_close($conn);

  //echo $user_id_value;
  //echo $id;
  // 페이지 이동
  header("location: order_list.php");
?>