<?php
include('../config/config.php');
if (isset($_GET['manv'])) {
 
    $del_manv = $_GET['manv'];
    echo $del_manv;
    $sql = "DELETE FROM db_nhanvien WHERE db_nhanvien.manv = '$del_manv'";
    if(mysqli_query($cnn, $sql))
    {
        header('Location: index.php');
    }
    else
    {
        echo "false";
    }
} else {
    echo "khong";
}