
<?php
  session_start();
  $user_id = $_SESSION['user_id'];

  $host_name = '127.0.0.1';
  $user_name = 'root';
  $password = 'gozldgkwlak!724';
  $dbName = 'user_data';
  $tbName = 'user_profile';

  $pw_value = $_POST["inputPassword"];

  $query = "UPDATE $dbName.$tbName SET `pw` = '$pw_value' WHERE (`id` = '$user_id');";

  // mysql 접속
  $conn = mysqli_connect($host_name, $user_name, $password) or die ("mysql 접속 실패");
  print "mysql 접속 성공";

  // 데이터베이스 선택
  mysqli_select_db($conn, $dbName) or die ("db 접속 실패");
  print "db 접속 성공";

  // 쿼리 전송
  mysqli_query($conn, $query)  or die ("insert into 접속 실패");
  print "insert into 접속 성공";

  // mysql 종료
  mysqli_close($conn) or die ("mysql 종료 실패");
  print "mysql 종료 성공";

  // 페이지 이동
  header("location: mypage.php");
  


?>