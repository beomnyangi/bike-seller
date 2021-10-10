
<?php
  $host_name = '127.0.0.1';
  $user_name = 'root';
  $password = 'gozldgkwlak!724';
  $dbName = 'user_data';
  $tbName = 'user_order';

  $user_id_value = $_POST["user_id"];
  $name_value = $_POST["name"];
  $phone_value = $_POST["phone"];
  $address_value = $_POST["address"];
  $address2_value = $_POST["address2"];
  $zip_value = $_POST["zip"];
  $com_value = $_POST["com"];
  $goods_info_value = $_POST["goods_info"];
  $info_array = json_encode($goods_info_value);
  $goods_size_value = $_POST["goods_size"];
  $size_array = json_encode($goods_size_value);
  $merchant_uid_value = $_POST["merchant_uid"];

  $query = "INSERT INTO $dbName.$tbName (`user_id`, `recipient`, `contact`, `zip_code`, `address`, `address_opt`, `memo`, `goods_info`, `goods_size`, merchant_uid) VALUES ('$user_id_value', '$name_value', '$phone_value', '$zip_value', '$address_value', '$address2_value', '$com_value', '$info_array', '$size_array', '$merchant_uid_value');";

  // mysql 접속
  $conn = mysqli_connect($host_name, $user_name, $password);

  // 데이터베이스 선택
  mysqli_select_db($conn, $dbName);

  // 쿼리 전송
  $result = mysqli_query($conn, $query);

  // mysql 종료
  mysqli_close($conn);

  // 페이지 이동
  header("location: order_finish.php");
?>