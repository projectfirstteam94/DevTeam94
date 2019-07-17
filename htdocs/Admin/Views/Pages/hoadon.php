
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Hóa Đơn</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?php
    require_once ("../Layout/Library.php");
    ?>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
    <?php require_once ("../Layout/Menu.php");?>
    <?php require_once ("../../Controller/ctr_hoadon.php");?>
    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <?php
                    if(isset($capnhap)) {
                        if ($capnhap == 1) {
                            echo '
                    <div class="alert alert-success alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Đã Giao Hàng!</strong></div>';
                            $capnhap = 3;
                        } else if ($capnhap == 0) {
                            echo '
                    <div class="alert alert-warning alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Lỗi không chuyển sang được !</strong></div>';
                            $capnhap = 3;
                        }
                        unset($capnhap);
                        unset($dagiao);
                    }
                ?>
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh Sách Hóa Đơn Chưa Giao Hàng</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php  if(isset($arr_hd_chua) && $arr_hd_chua != null) { ?>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <!--                                    <th style="width: 10px">Stt</th>-->
                                        <th>Mã Hóa Đơn</th>
                                        <th>Mã Khách Hàng</th>
                                        <th>Ngày Lập</th>
                                        <th>Thành Tiền</th>
                                        <th>Số Lượng</th>
                                        <td> Tương Tác</td>
                                    </tr>
                                    <?php
                                    while ($value = mysqli_fetch_assoc($arr_hd_chua)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $value["Id"]; ?></td>
                                            <td><?php echo $value["Id_KhacHang"]; ?></td>
                                            <td><?php echo $value["NgayLap"]; ?></td>
                                            <td><?php echo $value["ThanhTien"]; ?></td>
                                            <td><?php echo $value["SoLuong"]; ?></td>
                                            <td>
                                                <div style="margin-top: 10px;">
                                                    <a href="chitiethoadon.php?chitiet=<?php echo $value["Id"];?>" class="btn btn-default btn-sm"
                                                            style="background-color: #d0c624">
                                                        <i class="fa fa-fw fa-envelope-o"></i> Xem
                                                    </a>
                                                    <a href="hoadon.php?dagiao=<?php echo $value["Id"];?>" class="btn btn-success btn-sm" >
                                                        <i class="fa fa-fw fa-check-square"></i> Đã Giao
                                                    </a>
                                                </div>

                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <?php
                            }else{
                                echo "<h3 class='box-title' style='text-align: center'>Không có hóa đơn nào</h3>";
                            }
                            ?>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                <?php
                                if(isset($trang) && $trang !=0){
                                    if($trang < 8){
                                        if(isset($tr)) {
                                            $tien = $tr + 1;
                                            if ($tien > $trang) $tien = $trang;
                                            $lui = $tr - 1;
                                            if ($lui == 0) $lui = 1;
                                            echo "<li><a href='hoadon.php?trang=$lui'>«</a></li>";
                                            for ($i = 0; $i < $trang; $i++) {
                                                $j = $i + 1;
                                                echo "<li><a href='hoadon.php?trang=$j'>" . $j . "</a></li>";
                                            }
                                            echo "<li><a href='hoadon.php?trang=$tien'>»</a></li>";
                                        }
                                    }else {
                                        if(isset($tr)) {
                                            $tien = $tr + 1;
                                            if ($tien > $trang) $tien = $trang;
                                            $lui = $tr - 1;
                                            if ($lui == 0) $lui = 1;
                                            echo "<li><a href='hoadon.php?trang=$lui'>«</a></li>";
                                        if($tr < 4) {
                                            for ($i = $tr; $i < ($tr + 3); $i++) {
                                                echo "<li><a href='hoadon.php?trang=$i'>" . $i . "</a></li>";
                                                if ($i == ($tr + 2)) {
                                                    echo "<li><a href='#'>.......</a></li>";
                                                }
                                            }
                                            }
                                        }else  if($tr < ($trang-3)){
                                            for ($i=$tr;$i<($tr+3);$i++){
                                                echo "<li><a href='hoadon.php?trang=$i'>".$i."</a></li>";
                                                if($i == ($tr+2)){
                                                    echo "<li><a href='#'>.......</a></li>";
                                                }
                                            }
                                        }else{
                                            for ($i=$trang-3;$i<$trang;$i++){
                                                echo "<li><a href='hoadon.php?trang=$i'>".$i."</a></li>";
                                            }

                                        }
                                        echo "<li><a href='hoadon.php?trang=$trang'>".$trang."</a></li>";
                                        echo "<li><a href='hoadon.php?trang=$tien'>»</a></li>";
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh Sách Hóa Đơn Đã Giao Hàng</h3>
                            <div class="box-header with-border">
                                <form method="post" class="sidebar-form" style="border: 0px">
                                    <div class="input-group" style="border-radius:3px; border:1px solid #d2d6de ">
                                        <input type="text" name="tim" class="form-control" style="background-color:white" placeholder="Search..." required>
                                        <span class="input-group-btn">
                                    <button type="submit" name="btntim" id="search-btn"  style="background-color:white" class="btn btn-flat">
                                      <i class="fa fa-search"></i>
                                    </button>
                                  </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php  if(isset($arr_hd_da_xem) && $arr_hd_da_xem != null) { ?>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th>Mã Hóa Đơn</th>
                                        <th>Mã Khách Hàng</th>
                                        <th>Ngày Lập</th>
                                        <th>Thành Tiền</th>
                                        <th>Số Lượng</th>
                                        <td> Tương Tác</td>
                                    </tr>
                                    <?php
                                    while ($valuex = mysqli_fetch_assoc($arr_hd_da_xem)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $valuex["Id"]; ?></td>
                                            <td><?php echo $valuex["Id_KhacHang"]; ?></td>
                                            <td><?php echo $valuex["NgayLap"]; ?></td>
                                            <td><?php echo $valuex["ThanhTien"]; ?></td>
                                            <td><?php echo $valuex["SoLuong"]; ?></td>
                                            <td>
                                                <div style="margin-top: 10px;">
                                                    <a href="chitiethoadon.php?chitiet=<?php echo $valuex["Id"];?>" class="btn btn-default btn-sm"
                                                            style="background-color: #d0c624">
                                                        <i class="fa fa-fw fa-envelope-o"></i> Xem
                                                    </a>
                                                    <a href="hoadon.php?dagiao=<?php echo $valuex["Id"];?>" class="btn btn-danger btn-sm" >
                                                        <span class="glyphicon glyphicon-trash"></span> Xóa
                                                    </a>
                                                </div>

                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <?php
                            }else{
                                echo "<h3 class='box-title' style='text-align: center'>Không có hóa đơn nào</h3>";
                            }
                            ?>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                <?php
                                if(isset($sotrang)){
                                    if($sotrang < 8){
                                        if(isset($trx)){
                                            $tienx = $trx + 1;
                                            if($tienx > $sotrang) $tienx = $sotrang;
                                            $luix = $trx - 1;
                                            if($luix == 0 ) $luix = 1;
                                        }
                                        echo "<li><a href='hoadon.php?page=$luix'>«</a></li>";
                                        for ($ix=0;$ix<$sotrang;$ix++){
                                            $jx = $ix +1;
                                            echo "<li><a href='hoadon.php?page=$jx'>".$jx."</a></li>";
                                        }
                                        echo "<li><a href='hoadon.php?page=$tienx'>»</a></li>";
                                    }else {
                                        if(isset($trx)){
                                            $tienx = $trx + 1;
                                            if($tienx > $sotrang) $tien = $trang;
                                            $luix = $trx - 1;
                                            if($luix == 0 ) $luix = 1;
                                        }
                                        echo "<li><a href='hoadon.php?page=$luix'>«</a></li>";
                                        if($trx < 4){
                                            for ($ix=$trx;$ix<($trx+3);$ix++){
                                                echo "<li><a href='hoadon.php?page=$ix'>".$ix."</a></li>";
                                                if($ix == ($trx+2)){
                                                    echo "<li><a href='#'>.......</a></li>";
                                                }
                                            }
                                        }else  if($trx < ($sotrang-3)){
                                            for ($ix=$trx;$ix<($trx+3);$ix++){
                                                echo "<li><a href='hoadon.php?page=$ix'>".$ix."</a></li>";
                                                if($i == ($trx+2)){
                                                    echo "<li><a href='#'>.......</a></li>";
                                                }
                                            }
                                        }else{
                                            for ($ix=$sotrang-3;$ix<$sotrang;$ix++){
                                                echo "<li><a href='hoadon.php?page=$ix>".$ix."</a></li>";
                                            }

                                        }
                                        echo "<li><a href='hoadon.php?page=$sotrang'>".$sotrang."</a></li>";
                                        echo "<li><a href='hoadon.php?page=$tienx'>»</a></li>";
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
</div><!-- ./wrapper -->
</body>
</html>