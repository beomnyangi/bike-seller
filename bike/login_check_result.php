<?php
    $id_value = $_POST["inputEmail"];
    $pw_value = $_POST["inputPassword"];
    $ret['check'] = false;
    //if($id_value != ''){
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
        //printf("id-pw : %s", $row["pw"]);
        $id_check = $row["email"];
        $id_pw = $row["pw"];
        
        if($id_check == ''){
            $ret['check'] = "id_no";
        }
        if($id_check == $id_value){
            $ret['check'] = "id_ok";
            if($pw_value == $id_pw){
                $ret['check'] = "pw_ok";
            }
            else{
                $ret['check'] = "pw_no";
            }
        }
        

        mysqli_close($conn);
        

    //}
    echo json_encode($ret);
    
?>

