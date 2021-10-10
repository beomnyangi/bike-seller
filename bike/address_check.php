<?php
    session_start();
    //$id_value = $_POST["user_id"];
    $id_value = $_SESSION['user_id'];
    $host_name = '127.0.0.1';
    $user_name = 'root';
    $password = 'gozldgkwlak!724';
    $dbName = 'user_data';
    $tbName = 'user_profile';
    
    $query = "SELECT * FROM user_profile";
    
    // mysql 접속
    $conn = mysqli_connect($host_name, $user_name, $password);
    
    // 데이터베이스 선택
    mysqli_select_db($conn, $dbName);
    
    // 쿼리 전송
    $result = mysqli_query($conn, $query);
    
    // 결과값 가져오기
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $result_address = mysqli_query($conn, "SELECT * FROM user_profile WHERE id = $id_value");
    $result_row = mysqli_fetch_array($result_address, MYSQLI_ASSOC);

    $id = $result_row['id'];
    if($id_value == $id){
        $ret['name'] = $result_row[name];
        $ret['phone'] = $result_row[contact];
        $ret['address'] = $result_row[address];
        $ret['address2'] = $result_row[address_detail];
        $ret['zip'] = $result_row[postcode];
    }
    
    mysqli_close($conn);
    echo json_encode($ret);
?>