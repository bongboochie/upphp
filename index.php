<?php
include('header.php');
?>

<?php
    if(!isset($_GET['dropdown']))
    {
        include('phoneEmp.php');
    }
    else
    {
        if($_GET['dropdown']=="dbnd")
        {
            include('phoneEmp.php');
        }
        else
        {
            include('phoneUnit.php');
        }
    }
?>
<?php 
include('footer.php');
?>