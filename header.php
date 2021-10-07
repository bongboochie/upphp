<?php
// Start the session
session_start();
include('config/config.php')
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <title>Hello, world!</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-4">
                    <div class="menu-logo p-3">
                        <a href="index.php"><img src="<?php echo SITEURL; ?>images/logo.png" class="img-fluid" alt=""></a>
                    </div>
                </div>
                <div class="col-8">
                    <nav class="navbar navbar-expand-lg navbar-dark " aria-label="Fifth navbar example">
                        <div class="container-fluid" style="margin-left:-25px">
                            <a class="navbar-brand" href="index.php" style="color:blue;">Trang chủ</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation" style="margin-right:-45px">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarsExample05">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-bs-toggle="dropdown" aria-expanded="false" style="color:blue;">
                                            <?php 
                                                if(!isset($_GET['dropdown']))
                                                {
                                                    echo "Danh bạ người dùng";
                                                }
                                                else
                                                {
                                                    if($_GET['dropdown']=="dbnd")
                                                {
                                                    echo "Danh bạ người dùng";
                                                }
                                                else
                                                {
                                                    echo "Danh bạ đơn vị";
                                                }
                                                }
                                                
                                            ?>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdown05">
                                            <li><a class="dropdown-item" href="index.php?dropdown=dbnd">Danh bạ người dùng</a></li>
                                            <li><a class="dropdown-item" href="index.php?dropdown=dbdv">Danh bạ đơn vị</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled" style="color:blue;">Xin chào <span style="color:red"><?php
                                                    if (isset($_SESSION['name'])) {
                                                        echo $_SESSION['name'];
                                                    } else {
                                                        echo "bạn";
                                                    }
                                                    ?> </span>!</a>
                                    </li>

                                </ul>
                                <form>
                                    <!-- <input class="form-control" type="text" placeholder="Search" aria-label="Search"> -->
                                    <?php
                                    if (isset($_SESSION['name'])) { ?>
                                        <a href="<?php echo SITEURL; ?>logout.php" style="margin-right:-50px;" class="btn btn-info">Đăng xuất</a>
                                    <?php } else { ?>
                                        <a href="<?php echo SITEURL; ?>register.php" class="btn btn-info">Đăngkí</a>
                                        <a href="<?php echo SITEURL; ?>logins.php" class="btn btn-info" style="margin-right:-50px;">Đăngnhập</a>
                                    <?php
                                    } ?>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>