<!DOCTYPE html>
<html>
  <head></head>
    <body>
      <p>이름: <?php echo $_GET["cart_id"]; ?></p>
      <p>이름: <?php echo $_POST["count"]; ?></p>
      <?php

      $host_name = '127.0.0.1';
      $user_name = 'root';
      $password = 'gozldgkwlak!724';
      $dbName = 'user_data';
      $tbName = 'user_cart';

      $cart_id_value = $_GET["cart_id"];
      
      $count = $_POST["count"];


      if($count >= 0){
        for($i = 0; $i < $count; $i++){
          $value = $_POST[$i];
  
          $query = "DELETE FROM $dbName.$tbName WHERE (`id` = $value);";
      
          // mysql 접속
          $conn = mysqli_connect($host_name, $user_name, $password) or die ("mysql 접속 실패");
          print "mysql 접속 성공";
  
          // 데이터베이스 선택
          mysqli_select_db($conn, $dbName) or die ("db 접속 실패");
          print "db 접속 성공";
  
          // 쿼리 전송
          mysqli_query($conn, $query)  or die ("insert into 접속 실패");
          print "insert into 접속 성공";
        }
      }
      
      if($cart_id_value != ""){
        $query = "DELETE FROM $dbName.$tbName WHERE (`id` = $cart_id_value);";
        
        // mysql 접속
        $conn = mysqli_connect($host_name, $user_name, $password) or die ("mysql 접속 실패");
        print "mysql 접속 성공";

        // 데이터베이스 선택
        mysqli_select_db($conn, $dbName) or die ("db 접속 실패");
        print "db 접속 성공";

        // 쿼리 전송
        mysqli_query($conn, $query)  or die ("insert into 접속 실패");
        print "insert into 접속 성공";
      }
      

      // mysql 종료
      mysqli_close($conn) or die ("mysql 종료 실패");
      print "mysql 종료 성공";

      // 페이지 이동
      header("location: order_cart.php");

      ?>
    </body>
</html>