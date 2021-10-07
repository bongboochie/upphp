<main>
    <div class="container">
        <div class="row">
            <div class="col-4 bg-light">
                tree
            </div>
            <div class="col-8">
                <a href="addmem.php"><button class="btn btn-info">Thêm</button></a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên đơn vị</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Email</th>
                            <th scope="col">Website</th>
                            <th scope="col">Điện thoại</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                          
                            $sql = "select * from db_donvi";
                            $result = mysqli_query($cnn, $sql);
                           # echo mysqli_num_rows($result);
                            if (mysqli_num_rows($result)>0) {
                                $count = 1;
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <th scope="row"><?php echo $count ?></th>
                            <td><?php echo $row['madv'] ?></td>
                            <td><?php echo $row['diachi'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['website'] ?></td>
                            <td><?php echo $row['dienthoai'] ?></td>
                            <td><a href="#"><i class="fas fa-edit"></i></a>
                            </td>
                            <td><a href="#"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                                $count++;
                                }
                            }

                            ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>