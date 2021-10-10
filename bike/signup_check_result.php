<?php
    $id_value = $_POST["inputEmail"];
    $ret['check'] = false;
    if($id_value != ''){
        $host_name = '127.0.0.1';
        $user_name = 'root';
        $password = 'gozldgkwlak!724';
        $dbName = 'user_data';
        $tbName = 'user_profile';

        $query = "SELECT * FROM user_profile WHERE email = '$id_value'";
      
        // mysql 접속
        $conn = mysqli_connect($host_name, $user_name, $password);

        // 데이터베이스 선택
        mysqli_select_db($conn, $dbName);

        // 쿼리 전송
        $result = mysqli_query($conn, $query);

        // 결과값 가져오기
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $id_check = $row["email"];

        if($id_check == ''){
            $ret['check'] = true;
        }

        mysqli_close($conn);

    }
    echo json_encode($ret);
    
?>

