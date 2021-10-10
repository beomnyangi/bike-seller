<!DOCTYPE html>
<html>
  <head></head>
    <body>
      <p>이름: <?php echo $_POST["inputEmail"]; ?></p>
      <p>비밀번호: <?php echo $_POST["inputPassword"]; ?></p>
      <?php

      $host_name = '127.0.0.1';
      $user_name = 'root';
      $password = 'gozldgkwlak!724';
      $dbName = 'user_data';
      $tbName = 'user_profile';

      $login_check = $_COOKIE['user_id'];

      $query = "SELECT * FROM user_profile WHERE id = '$login_check'";
      
      // mysql 접속
      $conn = mysqli_connect($host_name, $user_name, $password) or die ("mysql 접속 실패");
      print "mysql 접속 성공";
      echo "<br/>";

      // 데이터베이스 선택
      mysqli_select_db($conn, $dbName) or die ("db 접속 실패");
      print "db 접속 성공";
      echo "<br/>";

      // 쿼리 전송
      $result = mysqli_query($conn, $query)  or die ("query 접속 실패");
      print "query 접속 성공";
      echo "<br/>";

      // 결과값 가져오기
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $id_check = $row["id"];
      $id_pw = $row["pw"];
      $id_name = $row["name"];
      $id_email = $row["email"];
      echo "<br/>";
      
      // if($id_check == ''){
      //   printf("아이디 없음");
      //   echo "<br/>";
      // }

      // if($pw_value == $id_pw){
      //   printf("비밀번호 일치");
      //   echo "<br/>";
      // }else{
      //   printf("비밀번호 불일치");
      //   echo "<br/>";
      // }

      // mysql 종료
      mysqli_close($conn) or die ("mysql 종료 실패");
      print "mysql 종료 성공";

      /* If success */
      session_start();
      $_SESSION['user_id'] = $id_check;
      $_SESSION['user_email'] = $id_email;
      $_SESSION['user_name'] = $id_name;
      
      // 페이지 이동
      header("location: home.php");
      
      ?>
    </body>
</html>