
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sửa Sản Phẩm</title>
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
                    <?php
                    if(!checkId($_GET["suasanpham"])){
                        echo "<h1> Rất tiệc không có sản phẩm để sửa </h1>";
                    }
                    if(!isset($arr_edit)) echo "<h1> Rất tiệc không có sản phẩm để sửa </h1>";
                    else  {if($arr_edit==null){
                            echo "<h1> Rất tiệc không có sản phẩm để sửa </h1>";
                        }else
                        while ($value = mysqli_fetch_assoc($arr_edit)){
                            ?>
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Sửa Sản Phẩm </h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form class="form-horizontal" method="post">
                                    <div class="box-body">
                                            <div class="form-group">
                                                <label for="ma" class="col-sm-3 control-label">Mã</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="matruoc" value="<?php echo $value["Ma"];?>" hidden>
                                                    <input type="text" name="kichcotruoc" value="<?php echo $value["KichCo"];?>" hidden>
                                                    <input type="text" class="form-control" id="ma" name="ma" value="<?php echo $value["Ma"];?>" onblur="kiemTraMaSua(this.value,'<?php echo $value["Ma"];?>')" required>
                                                    <div  id="checkid" style="color: #760e09; font-size:15px; "></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="ten" class="col-sm-3 control-label">Tên</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="ten" name="ten" value="<?php echo $value["Ten"];?>" required>
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
                                                                <option value="<?php echo $loaisp["Id"];?>" <?php if($loaisp["Id"]==$value["LoaiSP"]){ echo "selected"; }?> > <?php echo $loaisp["Name"];?> </option>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ten" class="col-sm-3 control-label">Kích Cở</label>
                                            <div class="col-sm-7" style="margin-left: 15px">
                                                <div class="radio">
                                                    <table>
                                                        <tr>
                                                            <td style="width: 80px;">
                                                                <input type="radio" name="kichco" id="s" value="S" <?php if($value["KichCo"] =="S") echo "checked";?>> &nbsp;S
                                                            </td>
                                                            <td style="width: 80px;">
                                                                <input type="radio" name="kichco" id="m" value="M" <?php if($value["KichCo"] =="M") echo "checked";?>> &nbsp; M
                                                            </td>
                                                            <td style="width: 80px;">
                                                                <input type="radio" name="kichco" id="l" value="L" <?php if($value["KichCo"] =="L") echo "checked";?>> &nbsp; L
                                                            </td>
                                                            <td style="width: 80px;">
                                                                <input type="radio" name="kichco" id="xl" value="XL" <?php if($value["KichCo"] =="XL") echo "checked";?>> &nbsp; XL
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="soluong" class="col-sm-3 control-label">Số Lượng</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="soluong" id="soluong" value="<?php echo $value["SoLuong"];?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ma" class="col-sm-3 control-label">Giá Nhập </label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="gianhap" name="gianhap" value="<?php echo $value["GiaNhap"];?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ten" class="col-sm-3 control-label">Giá Bán</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="giaban" name="giaban" value="<?php echo $value["GiaBan"];?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ten" class="col-sm-3 control-label">Nhac Cung Cấp</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="nhacc" name="nhacc" value="<?php echo $value["NhaCC"];?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ten" class="col-sm-3 control-label">Ảnh</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" id="fileanh" onchange="datAnh()">
                                                <input type="text" class="form-control" id="anh" name="anh" value="<?php echo $value["Anh"];?> "  required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ten" class="col-sm-3 control-label">Chú Thích</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" rows="3" placeholder="Enter ..." name="chuthich" ><?php echo $value["ChuThich"];?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                            <a href="Home.php" type="reset" class="btn btn-info " style="width: 100px">Quay Về</a>
                                            <button type="submit" class="btn btn-default" name="btnsua" style="width: 100px;background-color:#d24922">Sửa</button>
                                            <button type="reset" class="btn btn-info pull-right" style="width: 100px">Hủy</button>
                                    </div>
                                    <!-- /.box-footer -->
                                </form>
                            </div>
                <?php
                        }
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
