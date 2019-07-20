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

            <!-- Right side column. Contains the navbar and content of the page -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header" style="text-align: center;">
					<h3>掲載新規登録</h3>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="col-md-2">
                          </div>
                          <div class="col-md-8">
                          <div class="box box-info">
                                      <form class="form-horizontal">
                                          <div class="box-body">
                                              <div class="form-group">
                                                  <label for="type" class="col-sm-2 lable_custom">type</label>
                                                  <div class="col-sm-10">
                                                    <select class="form-control" id="type" name="type">
                                                          <option value="1">type 1</option>
                                                          <option value="1">type 2</option>
                                                    </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="name" class="col-sm-2 lable_custom">name</label>
                                                  <div class="col-sm-10">
                                                      <input type="text" class="form-control" id="name" name="name"
                                                          placeholder="name">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="keyword" class="col-sm-2 lable_custom">keyword</label>
                                                  <div class="col-sm-10">
                                                      <input type="text" class="form-control" id="keyword" name="keyword"
                                                          placeholder="keyword">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="description" class="col-sm-12 lable_custom">description</label>
                                                  <div class="col-sm-12">
                                                      <input type="text" class="form-control" id="description" name="description"
                                                          placeholder="description">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="inputPassword3" class="col-sm-12 lable_custom">title</label>
                                                  <div class="col-sm-12">
                                                      <input type="text" class="form-control" id="title"  name="title"
                                                          placeholder="title">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-6">
                                                    <select class="form-control" id="area" name="area">
                                                          <option value="1">area 1</option>
                                                          <option value="1">area 2</option>
                                                    </select>
                                                  </div>
                                                  <div class="col-sm-6">
                                                      <input type="number" class="form-control" id="noarea" name="noarea"
                                                          placeholder="noarea">
                                                  </div>
                                              </div>
                                              <!-- 1 -->
                                              <div class="form-group">
                                                  <label for="alt1" class="col-sm-2 lable_custom">picture 1</label>
                                                  <label for="alt1" class="col-sm-1 lable_custom">alt</label>
                                                  <div class="col-sm-9">
                                                      <input type="text" class="form-control" id="alt1" name="alt1"
                                                          placeholder="alt">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-10">
                                                      <input type="file" class="form-control" id="file1" name="file1"
                                                          placeholder="text">
                                                  </div>
                                                  <div class="col-sm-2">
                                                         <input type="number" class="form-control" id="noarea" name="noarea"
                                                          placeholder="noImg">
                                                  </div>
                                              </div>
                                              <!-- 1 -->
                                              <!-- 2 -->
                                              <div class="form-group">
                                                  <label for="alt2" class="col-sm-2 lable_custom">picture 2</label>
                                                  <label for="alt2" class="col-sm-1 lable_custom">alt</label>
                                                  <div class="col-sm-9">
                                                      <input type="text" class="form-control" id="alt2" name="alt2"
                                                          placeholder="alt">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-10">
                                                      <input type="file" class="form-control"  id="file2" name="file2"
                                                          placeholder="text">
                                                  </div>
                                                  <div class="col-sm-2">
                                                            <input type="number" class="form-control" id="noarea" name="noarea"
                                                          placeholder="noImg">
                                                  </div>
                                              </div>
                                              <!-- 2 -->
                                              <!-- 3 -->
                                              <div class="form-group">
                                                  <label for="alt3" class="col-sm-2 lable_custom">picture 3</label>
                                                  <label for="alt3" class="col-sm-1 lable_custom">alt</label>
                                                  <div class="col-sm-9">
                                                      <input type="text" class="form-control" id="alt3" name="alt3"
                                                          placeholder="alt">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-10">
                                                      <input type="file" class="form-control"  id="file3" name="file3"
                                                          placeholder="text">
                                                  </div>
                                                  <div class="col-sm-2">
                                                      <input type="number" class="form-control" id="noarea" name="noarea"
                                                          placeholder="noImg">
                                                  </div>
                                              </div>
                                              <!-- 3 -->
                                              <!-- 4 -->
                                              <div class="form-group">
                                                  <label for="alt4" class="col-sm-2 lable_custom">picture 4</label>
                                                  <label for="alt4" class="col-sm-1 lable_custom">alt</label>
                                                  <div class="col-sm-9">
                                                      <input type="text" class="form-control" id="alt4" name="alt4"
                                                          placeholder="alt">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-10">
                                                      <input type="file" class="form-control"  id="file4" name="file4"
                                                          placeholder="text">
                                                  </div>
                                                  <div class="col-sm-2">
                                                      <input type="number" class="form-control" id="noarea" name="noarea"
                                                          placeholder="noImg">
                                                  </div>
                                              </div>
                                              <!-- 4 -->
                                              <!-- 5 -->
                                              <div class="form-group">
                                                  <label for="alt5" class="col-sm-2 lable_custom">picture 5</label>
                                                  <label for="alt5" class="col-sm-1 lable_custom">alt</label>
                                                  <div class="col-sm-9">
                                                      <input type="text" class="form-control" id="alt5" name="tyaltpe5"
                                                          placeholder="alt">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-10">
                                                      <input type="file" class="form-control" id="file5" name="file5
                                                          placeholder="text">
                                                  </div>
                                                  <div class="col-sm-2">
                                                      <input type="number" class="form-control" id="noarea" name="noarea"
                                                          placeholder="noImg">
                                                  </div>
                                              </div>
                                              <!-- 5 -->
                                              <!-- 6 -->
                                              <div class="form-group">
                                                  <label for="alt6" class="col-sm-2 lable_custom">picture 6</label>
                                                  <label for="alt6" class="col-sm-1 lable_custom">alt</label>
                                                  <div class="col-sm-9">
                                                      <input type="text" class="form-control" id="alt6" name="alt6"
                                                          placeholder="alt">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-10">
                                                      <input type="file" class="form-control" id="file6" name="file6"
                                                          placeholder="text">
                                                  </div>
                                                  <div class="col-sm-2">
                                                      <input type="number" class="form-control" id="noarea" name="noarea"
                                                          placeholder="noImg">
                                                  </div>
                                              </div>
                                              <!-- 6-->
                                              <!-- 7 -->
                                              <div class="form-group">
                                                  <label for="alt7" class="col-sm-2 lable_custom">picture 7</label>
                                                  <label for="alt7" class="col-sm-1 lable_custom">alt</label>
                                                  <div class="col-sm-9">
                                                      <input type="text" class="form-control" id="alt7" name="alt7"
                                                          placeholder="alt">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-10">
                                                      <input type="file" class="form-control" id="file7" name="file7"
                                                          placeholder="text">
                                                  </div>
                                                  <div class="col-sm-2">
                                                      <input type="number" class="form-control" id="noarea" name="noarea"
                                                          placeholder="noImg">
                                                  </div>
                                              </div>
                                              <!-- 7 -->
                                              <!-- 8 -->
                                              <div class="form-group">
                                                  <label for="alt8" class="col-sm-2 lable_custom">picture 8</label>
                                                  <label for="alt8" class="col-sm-1 lable_custom">alt</label>
                                                  <div class="col-sm-9">
                                                      <input type="text" class="form-control" id="alt8" name="alt8"
                                                          placeholder="alt">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-10">
                                                      <input type="file" class="form-control"  id="file8" name="file8"
                                                          placeholder="text">
                                                  </div>
                                                  <div class="col-sm-2">
                                                      <input type="number" class="form-control" id="noarea" name="noarea"
                                                          placeholder="noImg">
                                                  </div>
                                              </div>
                                              <!-- 8 -->
                                              <!-- 9 -->
                                              <div class="form-group">
                                                  <label for="alt9" class="col-sm-2 lable_custom">picture 9</label>
                                                  <label for="alt9" class="col-sm-1 lable_custom">alt</label>
                                                  <div class="col-sm-9">
                                                      <input type="text" class="form-control" id="alt9" name="alt9"
                                                          placeholder="alt">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-10">
                                                      <input type="file" class="form-control" id="text" id="file9" name="file9"
                                                          placeholder="text">
                                                  </div>
                                                  <div class="col-sm-2">
                                                      <input type="number" class="form-control" id="noarea" name="noarea"
                                                          placeholder="noImg">
                                                  </div>
                                              </div>
                                              <!-- 9 -->
                                              <div class="form-group">
                                                  <label for="faccity_conten" class="col-sm-12 lable_custom">faccity_conten</label>
                                                  <div class="col-sm-12">
                                                      <textarea class="form-control" rows="4" id="faccity_conten" name="faccity_conten"
                                                          placeholder="faccity conten ..."></textarea>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="bed_room" class="col-sm-2 lable_custom">bed_room</label>
                                                  <div class="col-sm-4">
                                                      <input type="number" class="form-control" id="bed_room" name="bed_room"
                                                          placeholder="bed_room">
                                                  </div>
                                                  <label for="bath_room" class="col-sm-2 lable_custom">bath_room</label>
                                                  <div class="col-sm-4">
                                                      <input type="number" class="form-control" id="bath_room" name="bath_room"
                                                          placeholder="bath_room">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="min_night" class="col-sm-2 lable_custom">min_night</label>
                                                  <div class="col-sm-3">
                                                      <input type="number" class="form-control" id="min_night" name="min_night"
                                                          placeholder="min_night">
                                                  </div>
                                                  <label for="min_night" class="col-sm-1 lable_custom_right">night </label>
                                                  <label for="max_people" class="col-sm-2 lable_custom">max_people</label>
                                                  <div class="col-sm-3">
                                                      <input type="number" class="form-control" id="max_people" name="max_people"
                                                          placeholder="max_people">
                                                  </div>
                                                  <label for="max_people" class="col-sm-1 lable_custom_right">people </label>
                                              </div>
                                              <div class="form-group">
                                                  <label for="price" class="col-sm-2 lable_custom">price</label>
                                                  <div class="col-sm-4">
                                                      <input type="number" class="form-control" id="price" name="price"
                                                          placeholder="price">
                                                  </div>
                                                  <label for="price" class="col-sm-2 lable_custom_right" >usd</label>
                                              </div>
                                              <div class="form-group">
                                                  <label for="sub_text" class="col-sm-12 lable_custom">sub_text </label>
                                                  <div class="col-sm-12">
                                                      <textarea class="form-control" rows="2" id="sub_text" name="sub_text"
                                                          placeholder="sub_text ..."></textarea>
                                                  </div>
                                              </div>
                                          </div>
                                          <!-- /.box-body -->
                                          <div class="box-footer">
                                              <button type="submit" class="btn btn-default pull-right">Close</button>
                                              <button type="submit" class="btn btn-info pull-left">Create</button>
                                          </div>
                                          <!-- /.box-footer -->
                                      </form>
                          </div>
                          </div>
                          <div class="col-md-2">
                          </div>
                        </div>
                    </div>
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <?php require_once ("../Layout/Footer.php");?>
        </div><!-- ./wrapper -->


    </body>

</html>
