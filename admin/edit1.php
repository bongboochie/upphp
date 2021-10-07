<?php
// Start the session
session_start();
?>
<?php
 //   header('location: index.php');
 include('../config/config.php');
 echo $_GET['madv'];
 if(isset($_GET['ten']) && $_GET['ten']!='')
 {
    $ten = $_GET['ten'];
    echo $_GET['ten'];
    $cv = $_GET['cv'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $madv = $_GET['madv'];
   # $tendv = $_GET['tendv'];
    $manv = $_SESSION['manv'];
    
    $sql = "UPDATE `db_nhanvien` SET `tennv`='$ten',`chucvu`='$cv',`email`='$email',`sodidong`='$phone', `madv`='$madv' WHERE db_nhanvien.manv = '$manv'";
    mysqli_query($cnn,$sql);
    header('location:index.php');
 }
 else
 {
    die("nhajpa laji");
 }
 
?>