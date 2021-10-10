<?php
    $host_name = '127.0.0.1';
    $user_name = 'root';
    $password = 'gozldgkwlak!724';
    $dbName = 'mysql';

    $link = mysqli_connect($host_name, $user_name, $password, $dbName);

    if ($link) {
            echo "MySQL 접속 성공";
    }
    else{
        echo "MySQL 접속 실패";
    }

    phpinfo();
?>
