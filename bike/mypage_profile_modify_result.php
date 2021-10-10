<!DOCTYPE html>
<html>
  <head></head>
    <body>
      <p>이름: <?php echo $_POST["inputName"]; ?></p>
      <p>이메일 주소: <?php echo $_POST["inputEmail"]; ?></p>
      <p>비밀번호: <?php echo $_POST["inputPassword"]; ?></p>
      <?php
      session_start();
      $user_id = $_SESSION['user_id'];

      $host_name = '127.0.0.1';
      $user_name = 'root';
      $password = 'gozldgkwlak!724';
      $dbName = 'user_data';
      $tbName = 'user_profile';

      $name_value = $_POST["inputName"];
      $email_value = $_POST["inputEmail"];
      $pw_value = $_POST["inputPassword"];

      $number_value = $_POST["number"];
      $postcode_value = $_POST["postcode"];
      $address_value = $_POST["address"];
      $address2_value = $_POST["address2"];

      $query = "UPDATE $dbName.$tbName SET `name` = '$name_value', `contact` = '$number_value', `postcode` = '$postcode_value', `address` = '$address_value', `address_detail` = '$address2_value' WHERE (`id` = '$user_id');";

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
      $_SESSION['user_name'] = $name_value;
      header("location: mypage.php");

      ?>
    </body>
</html>