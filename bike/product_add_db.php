<!DOCTYPE html>
<html>
  <head></head>
    <body>
      <p>이름: <?php echo $_POST["prod_name"]; ?></p>
      <p>이메일 주소: <?php echo $_POST["prod_price"]; ?></p>
      <p>비밀번호: <?php echo $_POST["prod_cate"]; ?></p>
	  <p>비밀번호: <?php echo $_POST["prod_com"]; ?></p>
    <?php

      // 사진파일 업로드
      $target_dir = "127.0.0.1";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // 이미지 파일이 실제 이미지인지 가짜 이미지인지 확인
      if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
          } else {
              echo "File is not an image.";
              $uploadOk = 0;
          }
      }
      // 파일이 이미 있는지 확인
      // if (file_exists($target_file)) {
      //     echo "Sorry, file already exists.";
      //     $uploadOk = 0;
      // }
      // 파일 크기 확인
      if ($_FILES["fileToUpload"]["size"] > 50000000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
      }
      // 특정 파일 형식 허용
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
      }
      // $ uploadOk가 오류로 인해 0으로 설정되었는지 확인
      if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
      // 모든 것이 정상이면 파일 업로드를 시도
      } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $filename = $_FILES["fileToUpload"]["name"];

            echo "<p>$filename</p>";
            echo "<p>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</p>";
            echo "<br><img src=127.0.0.1". basename( $_FILES["fileToUpload"]["name"]). ">";
            echo "<br><button type='button' onclick='history.back()'>돌아가기</button>";
          } else {
            echo "<p>Sorry, there was an error uploading your file.</p>";
            echo "<br><button type='button' onclick='history.back()'>돌아가기</button>";
          }
      }
      // 사진파일 업로드
      $target_dir = "127.0.0.1";
      $target_file = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // 이미지 파일이 실제 이미지인지 가짜 이미지인지 확인
      if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
          if($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
          } else {
              echo "File is not an image.";
              $uploadOk = 0;
          }
      }
      // 파일이 이미 있는지 확인
      // if (file_exists($target_file)) {
      //     echo "Sorry, file already exists.";
      //     $uploadOk = 0;
      // }
      // 파일 크기 확인
      if ($_FILES["fileToUpload1"]["size"] > 50000000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
      }
      // 특정 파일 형식 허용
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
      }
      // $ uploadOk가 오류로 인해 0으로 설정되었는지 확인
      if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
      // 모든 것이 정상이면 파일 업로드를 시도
      } else {
          if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file)) {
            $filename1 = $_FILES["fileToUpload1"]["name"];

            echo "<p>$filename1</p>";
            echo "<p>The file ". basename( $_FILES["fileToUpload1"]["name"]). " has been uploaded.</p>";
            echo "<br><img src=127.0.0.1". basename( $_FILES["fileToUpload1"]["name"]). ">";
            echo "<br><button type='button' onclick='history.back()'>돌아가기</button>";
          } else {
            echo "<p>Sorry, there was an error uploading your file.</p>";
            echo "<br><button type='button' onclick='history.back()'>돌아가기</button>";
          }
      }
      // 사진파일 업로드
      $target_dir = "127.0.0.1";
      $target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // 이미지 파일이 실제 이미지인지 가짜 이미지인지 확인
      if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
          if($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
          } else {
              echo "File is not an image.";
              $uploadOk = 0;
          }
      }
      // 파일이 이미 있는지 확인
      // if (file_exists($target_file)) {
      //     echo "Sorry, file already exists.";
      //     $uploadOk = 0;
      // }
      // 파일 크기 확인
      if ($_FILES["fileToUpload2"]["size"] > 50000000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
      }
      // 특정 파일 형식 허용
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
      }
      // $ uploadOk가 오류로 인해 0으로 설정되었는지 확인
      if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
      // 모든 것이 정상이면 파일 업로드를 시도
      } else {
          if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {
            $filename2 = $_FILES["fileToUpload2"]["name"];

            echo "<p>$filename2</p>";
            echo "<p>The file ". basename( $_FILES["fileToUpload2"]["name"]). " has been uploaded.</p>";
            echo "<br><img src=127.0.0.1". basename( $_FILES["fileToUpload2"]["name"]). ">";
            echo "<br><button type='button' onclick='history.back()'>돌아가기</button>";
          } else {
            echo "<p>Sorry, there was an error uploading your file.</p>";
            echo "<br><button type='button' onclick='history.back()'>돌아가기</button>";
          }
      }
      // 사진파일 업로드
      $target_dir = "127.0.0.1";
      $target_file = $target_dir . basename($_FILES["fileToUpload3"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // 이미지 파일이 실제 이미지인지 가짜 이미지인지 확인
      if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload3"]["tmp_name"]);
          if($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
          } else {
              echo "File is not an image.";
              $uploadOk = 0;
          }
      }
      // 파일이 이미 있는지 확인
      if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
      }
      // 파일 크기 확인
      if ($_FILES["fileToUpload3"]["size"] > 50000000000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
      }
      // 특정 파일 형식 허용
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
      }
      // $ uploadOk가 오류로 인해 0으로 설정되었는지 확인
      if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
      // 모든 것이 정상이면 파일 업로드를 시도
      } else {
          if (move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file)) {
            $filename3 = $_FILES["fileToUpload3"]["name"];

            echo "<p>$filename3</p>";
            echo "<p>The file ". basename( $_FILES["fileToUpload3"]["name"]). " has been uploaded.</p>";
            echo "<br><img src=127.0.0.1". basename( $_FILES["fileToUpload3"]["name"]). ">";
            echo "<br><button type='button' onclick='history.back()'>돌아가기</button>";
          } else {
            echo "<p>Sorry, there was an error uploading your file.</p>";
            echo "<br><button type='button' onclick='history.back()'>돌아가기</button>";
          }
      }


      $host_name = '127.0.0.1';
      $user_name = 'root';
      $password = 'gozldgkwlak!724';
      $dbName = 'goods_data';
      $tbName = 'goods_detail';
      
      $name_value = $_POST["prod_name"];
      $price_value = $_POST["prod_price"];
      $cate_value = $_POST["prod_cate"];
      $com_value = $_POST["prod_com"];

      // $name_value = addslashes($_POST[prod_name]);
      // $com_value = addslashes($_POST[prod_com]);

      $query = "INSERT INTO $dbName.$tbName (`prod_name`, `prod_price`, `prod_cate`, `prod_com`, `thumbnail`, `goods_image_1`, `goods_image_2`, `goods_image_3`) VALUES ('$name_value', '$price_value', '$cate_value', '$com_value', '$filename', '$filename1', '$filename2', '$filename3')";
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
      //header("location: login.php");
      $prevPage = $_SERVER['HTTP_REFERER'];
      // 변수에 이전페이지 정보를 저장

      //header('location:'.$prevPage);
      // 페이지 이동
      header("location:product_management.php");
      ?>
    </body>
</html>