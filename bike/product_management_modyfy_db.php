<!DOCTYPE html>
<html>
  <head></head>
    <body>
        <p>이름: <?php echo $_FILES["fileToUpload"]["name"]; ?></p>
        <p>이메일 주소: <?php echo $_POST["fileToUpload_1"]; ?></p>
        <p>비밀번호: <?php echo $_POST["fileToUpload_2"]; ?></p>
        <p>비밀번호: <?php echo $_POST["fileToUpload_3"]; ?></p>

        <?php

            // 썸네일 사진파일 업로드
            if($_POST["thumbnail_old"] != "delete" || $_FILES["fileToUpload"]["name"] != ""){
                $filename = $_FILES["fileToUpload"]["name"];
                if($filename == ""){
                    $filename = $_POST["thumbnail_old"];
                }
            }

            $target_dir = "127.0.0.1";
            $target_file = $target_dir . basename($filename);
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
                    echo "<p>$filename</p>";
                    echo "<p>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</p>";
                    echo "<br><img src=127.0.0.1". basename( $_FILES["fileToUpload"]["name"]). ">";
                    echo "<br><button type='button' onclick='history.back()'>돌아가기</button>";
                } else {
                    echo "<p>Sorry, there was an error uploading your file.</p>";
                    echo "<br><button type='button' onclick='history.back()'>돌아가기</button>";
                }
            }


            // 사진1 사진파일 업로드

            if($_POST["image_1_old"] != "delete" || $_FILES["fileToUpload1"]["name"] != ""){
                $filename1 = $_FILES["fileToUpload1"]["name"];
                if($filename1 == ""){
                    $filename1 = $_POST["image_1_old"];
                }
            }

            $target_dir = "127.0.0.1";
            $target_file = $target_dir . basename($filename1);
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
            // 사진2 사진파일 업로드
            if($_POST["image_2_old"] != "delete" || $_FILES["fileToUpload2"]["name"] != ""){
                $filename2 = $_FILES["fileToUpload2"]["name"];
                if($filename2 == ""){
                    $filename2 = $_POST["image_2_old"];
                }
            }

            $target_dir = "127.0.0.1";
            $target_file = $target_dir . basename($filename2);
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
            // 사진3 사진파일 업로드
            if($_POST["image_3_old"] != "delete" || $_FILES["fileToUpload3"]["name"] != ""){
                $filename3 = $_FILES["fileToUpload3"]["name"];
                if($filename3 == ""){
                    $filename3 = $_POST["image_3_old"];
                }
            }

            $target_dir = "127.0.0.1";
            $target_file = $target_dir . basename($filename3);
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

            $detail = $_POST["detail"];

            $host_name = '127.0.0.1';
            $user_name = 'root';
            $password = 'gozldgkwlak!724';
            $dbName = 'goods_data';
            $tbName = 'goods_detail';
            
            $name_value = $_POST["prod_name"];
            $price_value = $_POST["prod_price"];
            $cate_value = $_POST["prod_cate"];
            $com_value = $_POST["prod_com"];
            
            if(isset($_POST["submit"])) {
            $query = "UPDATE $dbName.$tbName SET `prod_name` = '$name_value', `prod_cate` = '$cate_value', `prod_price` = '$price_value', `prod_com` = '$com_value', `thumbnail` = '$filename', `goods_image_1` = '$filename1', `goods_image_2` = '$filename2', `goods_image_3` = '$filename3' WHERE (`id` = '$detail');";
            }
            if(isset($_POST["delete"])) {
            $query = "DELETE FROM $dbName.$tbName WHERE (`id` = '$detail');";
            }
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
            header("location:product_management.php");
        ?>
    </body>
</html>