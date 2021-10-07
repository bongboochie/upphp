<?php
    session_start();
    include('config/config.php');
    if(isset($_GET['email']))
    {
        #truy vấn lấy dữ liệu user có email 
        $email = $_GET['email'];
        echo $_GET['activation'];
        $act = $_GET['activation'];
       
        $sql1 = "SELECT * from newuser where mail = '$email'";
        $query = mysqli_query($cnn,$sql1);
        if(mysqli_num_rows($query)==1)
        {
            $row = mysqli_fetch_assoc($query);
            if($row['activation'] == $act)
            {
                $sql2 = "UPDATE `newuser` SET `status`='1' WHERE mail = '$email'";
                mysqli_query($cnn, $sql2);
                echo "done";
            }
        }
    }
?>