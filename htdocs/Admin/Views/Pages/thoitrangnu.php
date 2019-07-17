
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thời Trang Nữ</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?php
    require_once ("../Layout/Library.php");
    ?>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">

    <?php require_once ("../Layout/Menu.php");?>
    <?php require_once ("../../Controller/ctr_sanpham.php");?>
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
                            <h3 class="box-title">Danh Sách sản phẩm</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <!--                                    <th style="width: 10px">Stt</th>-->
                                    <th>Mã </th>
                                    <th>Tên </th>
                                    <th>Loại SP </th>
                                    <th>Kích Cở </th>
                                    <th>Giá Nhập</th>
                                    <th>Giá Bán</th>
                                    <th>Nha cung cấp</th>
                                    <th>Ngày nhập</th>
                                    <th>Ảnh</th>
                                    <th>Số Lượng </th>
                                    <th>Chú Thích </th>
                                    <th>Tương Tác</th>
                                </tr>
                                <?php
                                if(isset($arr_sp)){
                                    while ($value = mysqli_fetch_assoc($arr_sp)){
                                        ?>
                                        <tr>
                                            <td><?php echo $value["Ma"];?></td>
                                            <td><?php echo $value["Ten"];?></td>
                                            <td><?php echo $value["LoaiSP"];?></td>
                                            <td><?php echo $value["KichCo"];?></td>
                                            <td><?php echo $value["GiaNhap"];?></td>
                                            <td><?php echo $value["GiaBan"];?></td>
                                            <td><?php echo $value["NhaCC"];?></td>
                                            <td><?php echo $value["NgayNhap"];?></td>
                                            <td> <img src="../../../DesignerUser/Assets/image/<?php echo $value["Anh"];?>" style="width: 60px; height: 60px;"></td>
                                            <td><?php echo $value["SoLuong"];?></td>
                                            <td><?php echo $value["ChuThich"];?></td>
                                            <td>
                                                <div style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-default btn-sm" style="background-color: #d0c624">
                                                        <span class="glyphicon glyphicon-trash"></span> Xóa
                                                    </button>
                                                    <a href="suasanpham.php?suasanpham=<?php echo $value["Ma"];?>" class="btn btn-default btn-sm" style="background-color: #34bee9">
                                                        <span class="glyphicon glyphicon-trash" ></span> Sửa
                                                    </a>
                                                </div>

                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                <li><a href="#">«</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
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