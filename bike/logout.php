<?php
    session_start();
    session_destroy();

    setcookie('user_id', "", time() + 360, '/');
    setcookie('count', "", time() + 360, '/');
?>
<meta http-equiv="refresh" content="0;url=home.php" />