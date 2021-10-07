<?php 

    include('../header.php');
    
?>
    <div class="container">
        <div class="row">
            <form action="addmem.php" method="POST">
                <p>Thêm nhân viên</p>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Tên nhân viên</span>
                    <input type="text" class="form-control" placeholder="Ten nhan vien" name = "name" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Chức vụ</span>
                    <input type="text" class="form-control" placeholder="Chuc vu" name = "cv" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Máy bàn</span>
                    <input type="text" class="form-control" placeholder="May ban" name = "mb" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Email</span>
                    <input type="text" class="form-control" placeholder="Email" name="email" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Số di động</span>
                    <input type="text" class="form-control" placeholder="So di dong" name = "phone" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <select class="form-select" aria-label="Default select example" name="madv">
                        <?php 
                           
                            $sql = "select * from db_donvi";
                            $query = mysqli_query($cnn, $sql);
                            while($row = mysqli_fetch_assoc($query))
                            {?>

                                <option value=<?php echo$row['madv']; ?>><?php echo $row['tendv'] ;?></option>
                        <?php
                            }
                           // echo "<option value=2>Two</option>";
                        ?>
                    </select>
                </div>
                <a href=""><button type="submit" class="btn btn-primary ms-auto" name="submit">Submit</button></a>
            </form>
        </div>
    </div>
    <?php 
        //if()
        if(isset($_POST['submit']))
        {
            $ten = $_POST['name'];
            $cv = $_POST['cv'];
            $mb = $_POST['mb'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            //them khoa
            $khoa = $_POST['madv'];
            echo $khoa;
            $sql = "INSERT INTO `db_nhanvien`( `tennv`, `chucvu`, `mayban`, `email`, `sodidong`, `madv`) 
            VALUES ('$ten','$cv','$mb','$email','$phone','$khoa')";
            $query = mysqli_query($cnn, $sql);
            if($query)
            {
                header('location: index.php');
                
            }
            else
            {
                echo "that bai";
            }

            
        }

    ?>
<?php
    include('../footer.php');
?>