
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <form method="post" class="sidebar-form" style="border: 0px">
                            <div class="form-group col-sm-2">
                                    <select class="form-control" name="chontimkiem">
                                        <option value="ma">Mã</option>
                                        <option value="ten">Tên</option>
                                    </select>
                                </div>
                                <div class="input-group col-sm-10" style="border-radius:3px; border:1px solid #d2d6de ">
                                    <input type="text" name="tim" class="form-control" style="background-color:white" placeholder="Search..." required>
                                    <span class="input-group-btn">
                                    <button type="submit" name="btntim" id="search-btn" style="background-color:white" class="btn btn-flat">
                                      <i class="fa fa-search"></i>
                                    </button>
                                  </span>
                                </div>
                               
                            </form>
                        </div>
                    <div class="box-body">
                        <?php
                        if(!isset($arr_ds_km)) {echo "<h1> Rất tiếc không có sản phẩm nào được khuyến mại </h1>";}
                        else if(isset($arr_ds_km)){
                        ?>
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <!--                                    <th style="width: 10px">Stt</th>-->
                                <th>Mã </th>
                                <th>Tên </th>
                                <th>Giá Nhập</th>
                                <th>Giá Bán</th>
                                <th>Ngày nhập</th>
                                <th>Giá Khuyến Mại</th>
                            </tr>
                            <?php
                            if($arr_ds_km!=null)
                                while ($value = mysqli_fetch_assoc($arr_ds_km)){
                                    ?>
                                    <tr>
                                        <td><?php echo $value["Ma"];?></td>
                                        <td><?php echo $value["Ten"];?></td>
                                        <td><?php echo $value["GiaNhap"];?></td>
                                        <td><?php echo $value["GiaBan"];?></td>
                                        <td><?php echo $value["NgayNhap"];?></td>
                                        <td><?php echo $value["GiaKhuyenMai"];?></td>
                                        <td>
                                            <div style="margin-top: 10px; width: 120px">
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal" onclick="hienMa('<?php echo $value["Ma"];?>','<?php echo $value["KichCo"];?>')">
                                                    <span class="glyphicon glyphicon-trash"></span> Xóa
                                                </button>
                                                <a href="suasanpham.php?suasanpham=<?php echo $value["Ma"];?>&kichco=<?php echo $value["KichCo"];?>" class="btn btn-info btn-sm" style="background-color: #34bee9">
                                                    <i class="fa fa-fw fa-edit"></i> Sửa
                                                </a>
                                                <a href="khuyenmaisanpham.php?khuyenmai=<?php echo $value["Ma"];?>" class="btn btn-default btn-sm" style="background-color: #fdff17; width: 115px;">
                                                    <i class="fa fa-fw fa-mail-reply-all"></i> Sale
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
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php require_once ("../Layout/Footer.php");?>
</div><!-- ./wrapper -->


</body>
</html>