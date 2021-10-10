<!DOCTYPE html>
<html>
  <head></head>
    <body>
      <p>이름: <?php echo $_POST["user_id"]; ?></p>
      <p>이메일 주소: <?php echo $_POST["goods_id"]; ?></p>
      <p>이메일 주소: <?php echo $_POST["goods_size"]; ?></p>
      <?php

      $host_name = '127.0.0.1';
      $user_name = 'root';
      $password = 'gozldgkwlak!724';
      $dbName = 'user_data';
      $tbName = 'user_cart';

      $user_id_value = $_POST["user_id"];
      $goods_id_value = $_POST["goods_id"];
      $goods_size_value = $_POST["goods_size"];
      
      $query = "INSERT INTO $dbName.$tbName (`user_id`, `goods_id`, `goods_size`) VALUES ('$user_id_value', '$goods_id_value', '$goods_size_value');";
      
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
      header("location: order_cart.php");

      ?>
    </body>
</html>