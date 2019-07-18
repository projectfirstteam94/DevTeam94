
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
            <a href="addoreditpost.php" type="button" class="btn btn-primary btn-sm">
                <span class="glyphicon glyphicon-plus" ></span> Thêm bài đăng
            </a>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <form method="post" class="sidebar-form" style="border: 0px">
                            <div class="form-group col-md-2">
<!--                                    <label> Tìm Kiếm Theo</label>-->
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
                            </form>
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