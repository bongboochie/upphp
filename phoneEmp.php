<main>
        <div class="container">
            <div class="row">
                <div class="col-4 bg-light">
                    tree
                </div>
                <div class="col-8">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Họ và Tên</th>
                                <th scope="col">Chức vụ</th>
                                <th scope="col">Email</th>
                                <th scope="col">Số di động</th>
                                <th scope="col">Tên đơn vị</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "select nv.manv, nv.tennv, nv.chucvu, nv.email, nv.sodidong, dv.tendv from db_nhanvien nv, db_donvi dv where nv.madv = dv.madv";
                            $result = mysqli_query($cnn, $sql);
                            if (mysqli_num_rows($result)>0) {
                                $count = 1;
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <th scope="row"><?php echo $count ?></th>
                                <td><?php echo $row['tennv'] ?></td>
                                <td><?php echo $row['chucvu'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['sodidong'] ?></td>
                                <td><?php echo $row['tendv'] ?></td>
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