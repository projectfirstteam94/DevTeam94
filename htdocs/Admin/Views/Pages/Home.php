
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


    <div class="content-wrapper">
        <section class="content-header">
            <a href="addoreditpost.php" type="button" class="btn btn-primary btn-sm">
                <span class="glyphicon glyphicon-plus" ></span> Thêm bài đăng
            </a>
        </section>
        <section class="content">
        <div class="row">
            <?php require_once ("../../Controller/ctr_post.php");?>
        </div>
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
                            <table class="table table-bordered">
                            <thead>
                                    <tr>
                                        <th>ID </th>
                                        <th>画像</th>
                                        <th>名前 </th>
                                        <th>タイプ名</th>
                                        <th>エリア</th>
										<th>作成時間</th>
										<th>作成ユーザー</th>
                                        <th>アクション</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        if($arr_post!=null){
                                        while ($value = mysqli_fetch_assoc($arr_post)){
                                            ?>
                                                <tr>
                                                <td><?php echo $value['id'];?></td>
                                                    <td><img src="<?php echo $value['image_path'];?>" style="width: 60px; height: 60px;"></td>
                                                    <td><?php echo $value['name'];?></td>                               
                                                    <td><?php echo $value['nametype'];?></td>
                                                    <td><?php echo $value['areaname'];?></td>
													<td><?php echo date_format (new DateTime($value['create_time']), 'd-m-Y');?></td>
                                                    <td><?php echo $value['create_user'];?></td>
                                                    <td>
                                                        <div style="margin-top: 10px; width: 130px">
                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal" onclick="deletepost('<?php echo $value->id ; ?>')">
                                                                <span class="glyphicon glyphicon-trash"></span>
                                                            </button>
                                                            <a href="addoreditpost.php?id=<?php echo $value['id']; ?>" class="btn btn-info btn-sm" style="background-color: #34bee9">
                                                                <i class="fa fa-fw fa-edit"></i>
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
                                            <h4 class="modal-title">Delete post</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h3>Have your ok delete post ?</h3>
                                            <div class="row">
                                            <div class="col-sm-12">
                                                <form method="post">
                                                    <input type="text" name="maxoa" id="maxoa" hidden>
                                                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary pull-right" name="btnxoa">Ok</button>
                                                </form>
                                            </div>
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