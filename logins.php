<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>How To Create Simple Login Form Design In Bootstrap 5</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form action="logins.php" method="POST" class="row g-3">
                        <h4>Welcome Back</h4>
                        <div class="col-12">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-12">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Password">
                        </div>
                        <!-- <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label" for="rememberMe"> Remember me</label>
                            </div>
                        </div> -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark float-end" name="submit">Login</button>
                        </div>
                    </form>
                    <hr class="mt-4">
                    <div class="col-12">
                        <p class="text-center mb-0">Have not account yet? <a href="register.php">Signup</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
    <?php
        include('config/config.php');
        if(isset($_POST['submit']))
        {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $pass = password_hash($password, PASSWORD_DEFAULT);
           
            //kiem tra xem da ton tai email hay chua
            $sql = "SELECT * from newuser where mail = '$email'";
            $result = mysqli_query($cnn, $sql);
            if(mysqli_num_rows($result)>0)
            {
                $row = mysqli_fetch_assoc($result);
                var_dump(password_verify($pass,$row['password']));
                if(password_verify($password,$row['password']))
                {
                    $_SESSION['name'] = $row['username'];
                    if($row['status']==1)
                    {
                        header('location: index.php');
                    }
                    if($row['status']==2)
                    {
                        header('location: http://localhost/login/admin/index.php');
                        $_SESSION['admin'] = "true";
                    }                    
                }

            }

        }
        
    ?>
</body>
</html>