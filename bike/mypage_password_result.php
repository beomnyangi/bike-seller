
<?php
  $ret['check'] = false;

  session_start();

  $host_name = '127.0.0.1';
  $user_name = 'root';
  $password = 'gozldgkwlak!724';
  $dbName = 'user_data';
  $tbName = 'user_profile';

  $id_value = $_SESSION['user_email'];
  $pw_value = $_POST["inputPassword_old"];

  $query = "SELECT * FROM user_profile WHERE email = '$id_value'";

  // mysql 접속
  $conn = mysqli_connect($host_name, $user_name, $password);

  // 데이터베이스 선택
  mysqli_select_db($conn, $dbName);

  // 쿼리 전송
  $result = mysqli_query($conn, $query);

  // 결과값 가져오기
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $id_check = $row["id"];
  $id_pw = $row["pw"];
  $id_name = $row["name"];
  $id_email = $row["email"];

  if($pw_value == $id_pw){
    $ret['check'] = true;
  }else{
    $ret['check'] = false;
  }

  // mysql 종료
  mysqli_close($conn);

  echo json_encode($ret);
?>