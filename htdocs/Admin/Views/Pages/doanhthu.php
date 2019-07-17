
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
                                <div class="form-group col-md-2">
                                        <select class="form-control" name="chontimkiem">
                                            <option value="ma">Mã</option>
                                            <option value="ten">Tên</option>
                                        </select>
                                </div>
                                <div class="input-group col-sm-10" style="border-radius:3px; border:1px solid #d2d6de ">
                                    <input type="text" name="tim" style="background-color:white" class="form-control" placeholder="Search..." required>
                                    <span class="input-group-btn">
                                    <button type="submit" name="btntim" style="background-color:white" id="search-btn" class="btn btn-flat">
                                      <i class="fa fa-search"></i>
                                    </button>
                                  </span>
                                </div>
                              
                            </form>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php
                            if(!isset($arr_sp)) {echo "<h1> Rất tiếc không có sản phẩm nào </h1>"; unset($_POST["btntim"]);}
                            else if(isset($arr_sp)){
                            ?>
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
                                if($arr_sp!=null)
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
                                                    <button type="button" class="btn btn-default btn-sm" style="background-color: #d0c624" data-toggle="modal" data-target="#myModal" onclick="hienMa('<?php echo $value["Ma"];?>','<?php echo $value["KichCo"];?>')">
                                                        <span class="glyphicon glyphicon-trash"></span> Xóa
                                                    </button>
                                                    <a href="suasanpham.php?suasanpham=<?php echo $value["Ma"];?>&kichco=<?php echo $value["KichCo"];?>" class="btn btn-default btn-sm" style="background-color: #34bee9">
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
                        <!--                        Model Delete-->
                        <div class="container">
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Xóa sản phẩm </h4>
                                        </div>
                                        <div class="modal-body">
                                            <h2>Bạn có đồng ý xóa sản phẩm ?</h2>
                                            <div style="margin-left: 400px;">
                                                <form method="post">
                                                    <input type="text" name="maxoa" id="maxoa" hidden>
                                                    <input type="text" name="sizexoa" id="sizexoa" hidden>
                                                    <button type="submit" class="btn btn-default" name="btnxoa">Đồng ý</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                <?php
                                if(isset($trang)){
                                    if($trang < 8){
                                        if(isset($tr)){
                                            $tien = $tr + 1;
                                            if($tien > $trang) $tien = $trang;
                                            $lui = $tr - 1;
                                            if($lui == 0 ) $lui = 1;
                                        }
                                        echo "<li><a href='Home.php?trang=$lui'>«</a></li>";
                                        for ($i=0;$i<$trang;$i++){
                                            $j = $i +1;
                                            echo "<li><a href='Home.php?trang=$j'>".$j."</a></li>";
                                        }
                                        echo "<li><a href='Home.php?trang=$tien'>»</a></li>";
                                    }else {
                                        if(isset($tr)){
                                            $tien = $tr + 1;
                                            if($tien > $trang) $tien = $trang;
                                            $lui = $tr - 1;
                                            if($lui == 0 ) $lui = 1;
                                        }
                                        echo "<li><a href='Home.php?trang=$lui'>«</a></li>";
                                        if($tr < 4){
                                            for ($i=$tr;$i<($tr+3);$i++){
                                                echo "<li><a href='Home.php?trang=$i'>".$i."</a></li>";
                                                if($i == ($tr+2)){
                                                    echo "<li><a href='#'>.......</a></li>";
                                                }
                                            }
                                        }else  if($tr < ($trang-3)){
                                            for ($i=$tr;$i<($tr+3);$i++){
                                                echo "<li><a href='Home.php?trang=$i'>".$i."</a></li>";
                                                if($i == ($tr+2)){
                                                    echo "<li><a href='#'>.......</a></li>";
                                                }
                                            }
                                        }else{
                                            for ($i=$trang-3;$i<$trang;$i++){
                                                echo "<li><a href='Home.php?trang=$i'>".$i."</a></li>";
                                            }

                                        }
                                        echo "<li><a href='Home.php?trang=$trang'>".$trang."</a></li>";
                                        echo "<li><a href='Home.php?trang=$tien'>»</a></li>";
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
    <?php require_once ("../Layout/Footer.php");?>
</div><!-- ./wrapper -->


</body>
</html>