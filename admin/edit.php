<?php
    include('../header.php');
?>
<main>
    <div class="container">
        <div class="mb-3 ml-12">
            <form action="edit1.php" method="GET">
                <?php
                        $idnv = $_GET['manv'];
                        $sql = "select nv.manv, nv.tennv, nv.chucvu, nv.email, nv.sodidong, dv.tendv from db_nhanvien nv, db_donvi dv where nv.madv = dv.madv and nv.manv = '$idnv'";
                        $query = mysqli_query($cnn, $sql);
                        $row = mysqli_fetch_assoc($query);
                        //echo mysqli_num_rows($query);
                        $_SESSION["manv"] = $idnv;
                    ?>
                <?php #echo $row['tennv']?>
                <div class="mb-3 col-4">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="text" class="form-control" value="<?php echo $row['tennv']?>" id="ten" name="ten">
                </div>
                <div class="mb-3 col-4">
                    <label for="exampleFormControlInput1" class="form-label">Chức vụ</label>
                    <input type="text" class="form-control" name="cv" value="<?php echo $row['chucvu']?>">
                </div>
                <div class="mb-3 col-4">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $row['email']?>">
                </div>
                <div class="mb-3 col-4">
                    <label for="exampleFormControlInput1" class="form-label">Số di động</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo $row['sodidong']?>">
                </div>
                <div class="col-4">
                <label for="exampleFormControlInput1" class="form-label">Khoa</label>
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
                <div class=" d-flex justify-content-center col-4">
                <button type="submit" class="btn btn-info mt-3">Lưu</button>
                </div>
                

            </form>

        </div>

    </div>
</main>
<?php
include('../footer.php');
?>