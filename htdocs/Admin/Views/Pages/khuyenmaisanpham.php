
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm Khuyến Mại</title>
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
            <?php require_once ("../../Controller/ctr_khuyenmai.php");?>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row" style="font-size: 15px;">
                <div class="col-md-8">
                    <?php
                    if(isset($check_km)) {
                        if ($check_km == 1) {
                            echo '
                        <div class="alert alert-success alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Khuyến Mại Sản Phẩm  Thành Công!</strong></div>';
                            $check_km = 3;
                        } else if ($check_km == 0) {
                            echo '
                        <div class="alert alert-warning alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Khuyến Mại Sản Phẩm Thất Bại!</strong></div>';
                            $check_km = 3;
                        }
                    }
                        if(!isset($arr_sp_km)) {
                            echo '<h3 class="box-title">Không có sản phẩm để khuyến mại</h3>';
                        }else
                        while ($value = mysqli_fetch_assoc($arr_sp_km)){
                            ?>
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Khuyến Mại Sản Phẩm </h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form class="form-horizontal" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="ma" class="col-sm-3 control-label">Mã</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="matruoc" value="<?php echo $value["Ma"];?>" hidden>
                                                <input type="text" class="form-control" id="ma" name="ma" value="<?php echo $value["Ma"];?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ten" class="col-sm-3 control-label">Tên</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="ten" name="ten" value="<?php echo $value["Ten"];?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ma" class="col-sm-3 control-label">Giá Nhập </label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="gianhap" name="gianhap" value="<?php echo $value["GiaNhap"];?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ten" class="col-sm-3 control-label">Giá Bán</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="giaban" name="giaban" value="<?php echo $value["GiaBan"];?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="giakhuyenma" class="col-sm-3 control-label">Giá Khuyến Mại</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="giakhuyenmai" name="giakhuyenmai"  required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <a href="Home.php" type="reset" class="btn btn-info " style="width: 100px">Quay Về</a>
                                        <button type="submit" class="btn btn-default" name="btnkhuyenmai" style="width: 100px;background-color:#ffe73a">Khuyến Mại</button>
                                        <button type="reset" class="btn btn-info pull-right" style="width: 100px">Hủy</button>
                                    </div>
                                    <!-- /.box-footer -->
                                </form>
                            </div>
                            <?php
                    }
                    ?>
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
