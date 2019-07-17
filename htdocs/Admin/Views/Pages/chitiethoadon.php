
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
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title" style="text-align: center">Thông Tin Khách Hàng Đặt Hàng</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php  if(isset($arr_tt_kh) && $arr_tt_kh != null) { ?>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <!--                                    <th style="width: 10px">Stt</th>-->
                                        <th>Mã</th>
                                        <th>Tên </th>
                                        <th>Giớ Tính </th>
                                        <th>Số Điện Thoại</th>
                                        <th>Email</th>
                                        <th>Đĩa Chỉ </th>
                                    </tr>
                                    <?php
                                    while ($value = mysqli_fetch_assoc($arr_tt_kh)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $value["Id"]; ?></td>
                                            <td><?php echo $value["Name"]; ?></td>
                                            <?php
                                            $gioitinh = "";
                                            if($value["Sex"] == 1 ){
                                                $gioitinh = "Nam";
                                            }else if($value["Sex"] == 0){
                                                $gioitinh = "Nữ";
                                            }else{ $gioitinh= "Khác";}
                                            ?>
                                            <td><?php echo $gioitinh; ?></td>
                                            <td><?php echo $value["Phone"]; ?></td>
                                            <td><?php echo $value["Email"]; ?></td>
                                            <td><?php echo $value["Address"]; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <?php
                            }else{
                                echo "<h3 class='box-title' style='text-align: center'>Rất tiếc không có gì để xem</h3>";
                            }
                            ?>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <a href="hoadon.php" class="btn btn-default btn-sm" style="background-color: #e98f53 ; font-size: 15px;">Quay Về</a>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title" style="text-align: center">Chi Tiết Hóa Đơn Khách Hàng</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php  if(isset($arr_ct_hd) && $arr_ct_hd != null) { ?>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <!--                                    <th style="width: 10px">Stt</th>-->
                                        <th>Mã Sản Phẩm</th>
                                        <th>Tên Sản Phẩm </th>
                                        <th>Kích Cở</th>
                                        <th>Giá</th>
                                        <th>Số Lượng</th>
                                        <th>Thành Tiền</th>
                                    </tr>
                                    <?php
                                    while ($value = mysqli_fetch_assoc($arr_ct_hd)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $value["Ma"]; ?></td>
                                            <td><?php echo $value["Ten"]; ?></td>
                                            <td><?php echo $value["KichCo"]; ?></td>
                                            <td><?php echo $value["GiaBan"]; ?></td>
                                            <td><?php echo $value["SoLuong"]; ?></td>
                                            <td><?php echo $value["ThanhTien"]; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <?php
                            }else{
                                echo "<h3 class='box-title' style='text-align: center'>Rất tiếc không có gì để xem</h3>";
                            }
                            ?>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
    </footer>
</div><!-- ./wrapper -->
</body>
</html>