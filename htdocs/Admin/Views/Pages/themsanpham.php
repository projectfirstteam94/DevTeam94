
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm Sản Phẩm</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?php
    require_once ("../Layout/Library.php");
    ?>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">

    <?php require_once ("../Layout/Menu.php");?>

    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <?php require_once ("../../Controller/ctr_sanpham.php");?>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row" style="font-size: 15px;">
                <div class="col-md-8">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Thêm Sản Phẩm </h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form class="form-horizontal" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="ma" class="col-sm-3 control-label">Mã</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="ma" name="ma"  onblur="kiemTraMa(this.value)" required>
                                                <div  id="checkid" style="color: #760e09; font-size:15px; "></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="ten" class="col-sm-3 control-label">Tên</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="ten" name="ten"  required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ma" class="col-sm-3 control-label">Loại Sản Phẩm</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="loaisp">
                                                    <?php
                                                    if($arr_loaisp != null){
                                                        while ($loaisp = mysqli_fetch_assoc($arr_loaisp)){
                                                            ?>
                                                            <option value="<?php echo $loaisp["Id"]?>" > <?php echo $loaisp["Name"];?> </option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ten" class="col-sm-3 control-label">Kích Cở</label>
                                            <div class="col-sm-8">
                                                <div class="checkbox">
                                                    <table>
                                                        <tr>
                                                            <td style="width: 80px;"><input type="checkbox" name="kichcos" id="s" value="S" checked > &nbsp;S</td>
                                                            <td style="width: 80px;"><input type="checkbox" name="kichcom" id="m" value="M"> &nbsp; M </td>
                                                            <td style="width: 80px;"><input type="checkbox" name="kichcol" id="l" value="L"> &nbsp; L </td>
                                                            <td style="width: 80px;"><input type="checkbox" name="kichcoxl" id="xl" value="XL"> &nbsp; XL </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="soluong" class="col-sm-3 control-label">Số Lượng</label>
                                                <div class="col-sm-8">
                                                    <table>
                                                        <tr>
                                                            <td style="width: 80px;"><input type="number" class="form-control" name="soluongs" id="size-s" style="display: block"></td>
                                                            <td style="width: 80px;"><input type="number" class="form-control" name="soluongm" id="size-m" style="display: block"></td>
                                                            <td style="width: 80px;"><input type="number" class="form-control" name="soluongl" id="size-l" style="display: block"></td>
                                                            <td style="width: 80px;"><input type="number" class="form-control" name="soluongxl" id="size-xl" style="display: block"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ma" class="col-sm-3 control-label">Giá Nhập </label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="gianhap" name="gianhap"  required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ten" class="col-sm-3 control-label">Giá Bán</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="giaban" name="giaban"  required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ten" class="col-sm-3 control-label">Nhac Cung Cấp</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="nhacc" name="nhacc"  required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ten" class="col-sm-3 control-label">Ảnh</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" id="anh" name="anh" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ten" class="col-sm-3 control-label">Chú Thích</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" rows="3" placeholder="Enter ..." name="chuthich"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <a href="Home.php" type="reset" class="btn btn-info " style="width: 100px">Quay Về</a>
                                        <button type="submit" class="btn btn-default" name="btnthem" style="width: 100px; background-color: #69b10b">Thêm</button>
                                        <button type="reset" class="btn btn-info pull-right" style="width: 100px">Hủy</button>
                                    </div>
                                    <!-- /.box-footer -->
                                </form>
                            </div>
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
