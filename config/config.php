<?php 
    define('SITEURL', 'http://localhost/login/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'dhtl_danhba');
    $cnn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME) ; //Database Connection
?>