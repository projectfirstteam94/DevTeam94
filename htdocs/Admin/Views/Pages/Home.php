
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
<body class="skin-blue sidebar-mini fixed">
<div class="wrapper">

<?php require_once ("../Layout/Menu.php");?>
<?php require_once ("../../Controller/ctr_post.php");?>

    <div class="content-wrapper">
        <section class="content-header">
            <a href="addoreditpost.php" type="button" class="btn btn-primary btn-sm">
                <span class="glyphicon glyphicon-plus" ></span> Thêm bài đăng
            </a>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <!-- <form method="post" class="sidebar-form" style="border: 0px">
                            <div class="form-group col-md-2">
                                    <select class="form-control" name="chontimkiem">
                                        <option value="ma">Mã</option>
                                        <option value="ten">Tên</option>
                                    </select>
                                </div>
                                <div class="input-group col-sm-10" style="border-radius:3px; border:1px solid #d2d6de ">
                                    <input type="text" name="tim" class="form-control" style="background-color:white" placeholder="Search..." required >
                                    <span class="input-group-btn">
                                    <button type="submit" name="btntim" id="search-btn" class="btn btn-flat" style="background-color:white">
                                      <i class="fa fa-search"></i>
                                    </button>
                                  </span>
                                </div>
                            </form> -->
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr>
                                        <th>ID </th>
                                        <th>Image </th>
                                        <th>Name </th>
                                        <th>nametype</th>
                                        <th>namearea</th>
										<th>Create Date</th>
										<th>Create User</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        if($arr_post!=null){
                                        while ($value = mysqli_fetch_assoc($arr_post)){
                                            ?>
                                                <tr>
                                                    <td><?php echo $value->id;?></td>
                                                    <td><img src="<?php $value->id;?>" style="width: 60px; height: 60px;"></td>
                                                    <td><?php echo $value->name;?></td>
                                                    <td><?php echo $value->nametype;?></td>
                                                    <td><?php echo $value->namearea;?></td>
													<td><?php echo $value->createDate;?></td>
                                                    <td><?php echo $value->createUser;?></td>
                                                    <td>
                                                        <div style="margin-top: 10px; width: 130px">
                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal" onclick="hienMa('<?php echo $value["Ma"];?>','<?php echo $value["KichCo"];?>')">
                                                                <span class="glyphicon glyphicon-trash"></span> Xóa
                                                            </button>
                                                            <a href="suasanpham.php?suasanpham=<?php echo $value["Ma"];?>&kichco=<?php echo $value["KichCo"];?>" class="btn btn-info btn-sm" style="background-color: #34bee9">
                                                                <i class="fa fa-fw fa-edit"></i> Sửa
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    }else{
                                      ?>
                                        <tr>
                                            <td colspan="15"><h3 style="color:red;text-align:center"> Không có dữ liệu</h3></td>
                                        </tr>
                                      <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="container">
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
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
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php require_once ("../Layout/Footer.php");?>
</div>
</body>
</html>