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
            <?php require_once ("PopupPost.php");?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <?php require_once ("../../Controller/ctr_addoreditpost.php");?>
                </div>
            </div>
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
                                      <form class="form-horizontal" method="post" enctype="multipart/form-data" name="frpost" id="frpost" >
                                          <div class="box-body">
                                              <div class="form-group">
                                                  <label for="type" class="col-sm-2 lable_custom">type <code>*</code></label>
                                                  <div class="col-sm-10">
                                                    <select class="form-control" id="type" name="type">
                                                        <?php
                                                            if($arr_type != null){
                                                                while ($type = mysqli_fetch_assoc($arr_type)){
                                                                    ?>
                                                                    <option value="<?php echo $type["id"]?>" > <?php echo $type["name"];?> </option>
                                                                    <?php
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="name" class="col-sm-2 lable_custom">name <code>*</code></label>
                                                  <div class="col-sm-10">
                                                      <input type="text" class="form-control" id="name" name="name"
                                                          placeholder="name">
                                                    <div class="validate-font" id="errorname" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="keyword" class="col-sm-2 lable_custom">keyword <code>*</code></label>
                                                  <div class="col-sm-10">
                                                      <input type="text" class="form-control" id="keyword" name="keyword"
                                                          placeholder="keyword">
                                                        <div class="validate-font" id="errorkeyword" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="description" class="col-sm-12 lable_custom">description <code>*</code></label>
                                                  <div class="col-sm-12">
                                                      <input type="text" class="form-control" id="description" name="description"
                                                          placeholder="description">
                                                    <div class="validate-font" id="errordescription" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="inputPassword3" class="col-sm-12 lable_custom">title <code>*</code></label>
                                                  <div class="col-sm-12">
                                                      <input type="text" class="form-control" id="title"  name="title"
                                                          placeholder="title">
                                                        <div class="validate-font" id="errortitle" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-6">
                                                    <select class="form-control" id="area" name="area">
                                                        <?php
                                                            if($arr_area != null){
                                                                while ($area = mysqli_fetch_assoc($arr_area)){
                                                                    ?>
                                                                    <option value="<?php echo $area["id"]?>" > <?php echo $area["name"];?> </option>
                                                                    <?php
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                  </div>
                                                  <div class="col-sm-6">
                                                      <input type="number" class="form-control" id="noImg" name="noImg" min="1" value="1"
                                                          placeholder="noImg">
                                                        <div class="validate-font" id="errornoImg" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <!-- 1 -->
                                              <div class="form-group">
                                                  <label for="alt1" class="col-sm-2 lable_custom">picture 1 <code>*</code></label>
                                                  <label for="alt1" class="col-sm-1 lable_custom">alt <code>*</code></label>
                                                  <div class="col-sm-9">
                                                      <input type="text" class="form-control" id="alt1" name="alt1"
                                                          placeholder="alt">
                                                    <div class="validate-font" id="erroralt1" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <!-- <img src="../../Upload/Images/1_0_225202-tuyenvietnam-1558330282786.jpg" /> -->
                                              <div class="form-group">
                                                  <div class="col-sm-10">
                                                      <input type="file" class="form-control" id="file1" name="file1" value="../../Upload/Images/1_0_225202-tuyenvietnam-1558330282786.jpg"
                                                          placeholder="text">
                                                  </div>
                                                  <div class="col-sm-2">
                                                         <input type="number" class="form-control" id="noImg1" name="noImg1" min="1" max="9" value="1"
                                                          placeholder="noImg">
                                                          <div class="validate-font" id="errornoImg1" style="display:none"></div>
                                                  </div>
                                                  <div class="col-sm-12">
                                                        <div class="validate-font" id="errorfile1" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <!-- 1 -->
                                              <!-- 2 -->
                                              <div class="form-group">
                                                  <label for="alt2" class="col-sm-2 lable_custom">picture 2 <code>*</code></label>
                                                  <label for="alt2" class="col-sm-1 lable_custom">alt<code>*</code></label>
                                                  <div class="col-sm-9">
                                                      <input type="text" class="form-control" id="alt2" name="alt2"
                                                          placeholder="alt">
                                                        <div class="validate-font" id="erroralt2" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-10">
                                                      <input type="file" class="form-control"  id="file2" name="file2"
                                                          placeholder="text">
                                                  </div>
                                                  <div class="col-sm-2">
                                                            <input type="number" class="form-control" id="noImg2" name="noImg2" min="1" max="9" value="2"
                                                          placeholder="noImg">
                                                          <div class="validate-font" id="errornoImg2" style="display:none"></div>
                                                  </div>
                                                  <div class="col-sm-12">
                                                        <div class="validate-font" id="errorfile2" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <!-- 2 -->
                                              <!-- 3 -->
                                              <div class="form-group">
                                                  <label for="alt3" class="col-sm-2 lable_custom">picture 3<code>*</code></label>
                                                  <label for="alt3" class="col-sm-1 lable_custom">alt<code>*</code></label>
                                                  <div class="col-sm-9">
                                                      <input type="text" class="form-control" id="alt3" name="alt3"
                                                          placeholder="alt">
                                                    <div class="validate-font" id="erroralt3" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-10">
                                                      <input type="file" class="form-control"  id="file3" name="file3"
                                                          placeholder="text">
                                                  </div>
                                                  <div class="col-sm-2">
                                                      <input type="number" class="form-control" id="noImg3" name="noImg3" min="1" max="9" value="3"
                                                          placeholder="noImg">
                                                          <div class="validate-font" id="errornoImg3" style="display:none"></div>
                                                  </div>
                                                  <div class="col-sm-12">
                                                        <div class="validate-font" id="errorfile3" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <!-- 3 -->
                                              <!-- 4 -->
                                              <div class="form-group">
                                                  <label for="alt4" class="col-sm-2 lable_custom">picture 4<code>*</code></label>
                                                  <label for="alt4" class="col-sm-1 lable_custom">alt<code>*</code></label>
                                                  <div class="col-sm-9">
                                                      <input type="text" class="form-control" id="alt4" name="alt4"
                                                          placeholder="alt">
                                                        <div class="validate-font" id="erroralt4" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-10">
                                                      <input type="file" class="form-control"  id="file4" name="file4"
                                                          placeholder="text">
                                                  </div>
                                                  <div class="col-sm-2">
                                                      <input type="number" class="form-control"  id="noImg4" name="noImg4" min="1" max="9" value="4"
                                                          placeholder="noImg">
                                                          <div class="validate-font" id="errornoImg4" style="display:none"></div>
                                                  </div>
                                                  <div class="col-sm-12">
                                                        <div class="validate-font" id="errorfile4" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <!-- 4 -->
                                              <!-- 5 -->
                                              <div class="form-group">
                                                  <label for="alt5" class="col-sm-2 lable_custom">picture 5<code>*</code></label>
                                                  <label for="alt5" class="col-sm-1 lable_custom">alt<code>*</code></label>
                                                  <div class="col-sm-9">
                                                      <input type="text" class="form-control" id="alt5" name="alt5"
                                                          placeholder="alt">
                                                        <div class="validate-font" id="erroralt5" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-10">
                                                      <input type="file" class="form-control" id="file5" name="file5"
                                                          placeholder="text">
                                                  </div>
                                                  <div class="col-sm-2">
                                                      <input type="number" class="form-control"  id="noImg5" name="noImg5" min="1" max="9" value="5"
                                                          placeholder="noImg">
                                                          <div class="validate-font" id="errornoImg5" style="display:none"></div>
                                                  </div>
                                                  <div class="col-sm-12">
                                                        <div class="validate-font" id="errorfile5" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <!-- 5 -->
                                              <!-- 6 -->
                                              <div class="form-group">
                                                  <label for="alt6" class="col-sm-2 lable_custom">picture 6<code>*</code></label>
                                                  <label for="alt6" class="col-sm-1 lable_custom">alt<code>*</code></label>
                                                  <div class="col-sm-9">
                                                      <input type="text" class="form-control" id="alt6" name="alt6"
                                                          placeholder="alt">
                                                    <div class="validate-font" id="erroralt6" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-10">
                                                      <input type="file" class="form-control" id="file6" name="file6"
                                                          placeholder="text">
                                                  </div>
                                                  <div class="col-sm-2">
                                                      <input type="number" class="form-control"  id="noImg6" name="noImg6" min="1" max="9" value="6"
                                                          placeholder="noImg">
                                                          <div class="validate-font" id="errornoImg6" style="display:none"></div>
                                                  </div>
                                                  <div class="col-sm-12">
                                                        <div class="validate-font" id="errorfile6" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <!-- 6-->
                                              <!-- 7 -->
                                              <div class="form-group">
                                                  <label for="alt7" class="col-sm-2 lable_custom">picture 7<code>*</code></label>
                                                  <label for="alt7" class="col-sm-1 lable_custom">alt<code>*</code></label>
                                                  <div class="col-sm-9">
                                                      <input type="text" class="form-control" id="alt7" name="alt7"
                                                          placeholder="alt">
                                                        <div class="validate-font" id="erroralt7" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-10">
                                                      <input type="file" class="form-control" id="file7" name="file7"
                                                          placeholder="text">
                                                  </div>
                                                  <div class="col-sm-2">
                                                      <input type="number" class="form-control"  id="noImg7" name="noImg7" min="1" max="9" value="7"
                                                          placeholder="noImg">
                                                          <div class="validate-font" id="errornoImg7" style="display:none"></div>
                                                  </div>
                                                  <div class="col-sm-12">
                                                        <div class="validate-font" id="errorfile7" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <!-- 7 -->
                                              <!-- 8 -->
                                              <div class="form-group">
                                                  <label for="alt8" class="col-sm-2 lable_custom">picture 8<code>*</code></label>
                                                  <label for="alt8" class="col-sm-1 lable_custom">alt<code>*</code></label>
                                                  <div class="col-sm-9">
                                                      <input type="text" class="form-control" id="alt8" name="alt8"
                                                          placeholder="alt">
                                                        <div class="validate-font" id="erroralt8" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-10">
                                                      <input type="file" class="form-control"  id="file8" name="file8"
                                                          placeholder="text">
                                                  </div>
                                                  <div class="col-sm-2">
                                                      <input type="number" class="form-control" id="noImg8" name="noImg8" min="1" max="9" value="8"
                                                          placeholder="noImg">
                                                          <div class="validate-font" id="errornoImg8" style="display:none"></div>
                                                  </div>
                                                  <div class="col-sm-12">
                                                        <div class="validate-font" id="errorfile8" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <!-- 8 -->
                                              <!-- 9 -->
                                              <div class="form-group">
                                                  <label for="alt9" class="col-sm-2 lable_custom">picture 9<code>*</code></label>
                                                  <label for="alt9" class="col-sm-1 lable_custom">alt<code>*</code></label>
                                                  <div class="col-sm-9">
                                                      <input type="text" class="form-control" id="alt9" name="alt9"
                                                          placeholder="alt">
                                                        <div class="validate-font" id="erroralt9" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-10">
                                                      <input type="file" class="form-control" id="file9" name="file9"
                                                          placeholder="text">
                                                  </div>
                                                  <div class="col-sm-2">
                                                      <input type="number" class="form-control" id="noImg9" name="noImg9" min="1" max="9" value="9"
                                                          placeholder="noImg">
                                                          <div class="validate-font" id="errornoImg9" style="display:none"></div>
                                                  </div>
                                                  <div class="col-sm-12">
                                                        <div class="validate-font" id="errorfile9" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <!-- 9 -->
                                              <div class="form-group">
                                                  <label for="faccity_conten" class="col-sm-12 lable_custom">faccity_conten<code>*</code></label>
                                                  <div class="col-sm-12">
                                                      <textarea class="form-control" rows="4" id="faccity_conten" name="faccity_conten"
                                                          placeholder="faccity conten ..."></textarea>
                                                  </div>
                                                  <div class="col-sm-12">
                                                        <div class="validate-font" id="errorfaccity_conten" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="bed_room" class="col-sm-2 lable_custom">bed_room<code>*</code></label>
                                                  <div class="col-sm-4">
                                                      <input type="number" class="form-control" id="bed_room" name="bed_room" min="1" value="1"
                                                          placeholder="bed_room">
                                                          <div class="validate-font" id="errorbed_room" style="display:none"></div>
                                                  </div>
                                                  <label for="bath_room" class="col-sm-2 lable_custom">bath_room<code>*</code></label>
                                                  <div class="col-sm-4">
                                                      <input type="number" class="form-control" id="bath_room" name="bath_room" min="1" value="1"
                                                          placeholder="bath_room">
                                                          <div class="validate-font" id="errorbath_room" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="min_night" class="col-sm-2 lable_custom">min_night<code>*</code></label>
                                                  <div class="col-sm-3">
                                                      <input type="number" class="form-control" id="min_night" name="min_night" min="1" value="1"
                                                          placeholder="min_night">
                                                          <div class="validate-font" id="errormin_night" style="display:none"></div>
                                                  </div>
                                                  <label for="min_night" class="col-sm-1 lable_custom_right">night </label>
                                                  <label for="max_people" class="col-sm-2 lable_custom">max_people<code>*</code></label>
                                                  <div class="col-sm-3">
                                                      <input type="number" class="form-control" id="max_people" name="max_people" min="2" value="2"
                                                          placeholder="max_people">
                                                          <div class="validate-font" id="errormax_people" style="display:none"></div>
                                                  </div>
                                                  <label for="max_people" class="col-sm-1 lable_custom_right">people</label>
                                              </div>
                                              <div class="form-group">
                                                  <label for="price" class="col-sm-2 lable_custom">price<code>*</code></label>
                                                  <div class="col-sm-4">
                                                      <input type="number" class="form-control" id="price" name="price" min="1" value="1"
                                                          placeholder="price">
                                                  </div>
                                                  <label for="price" class="col-sm-2 lable_custom_right" >usd</label>
                                                  <div class="col-sm-12">
                                                        <div class="validate-font" id="errorprice" style="display:none"></div>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="sub_text" class="col-sm-12 lable_custom">sub_text<code>*</code></label>
                                                  <div class="col-sm-12">
                                                      <textarea class="form-control" rows="2" id="sub_text" name="sub_text"
                                                          placeholder="sub_text ..."></textarea>
                                                  </div>
                                                  <div class="col-sm-12">
                                                        <div class="validate-font" id="errorsub_text" style="display:none"></div>
                                                  </div>
                                              </div>
                                          </div>
                                          <!-- /.box-body -->
                                          <div class="box-footer">
                                              <button type="button"  name="btnclose" id="btnclose" class="btn btn-default pull-right">Close</button>
                                              <button type="button" name="btnsave" id="btnsave" class="btn btn-info pull-left" onclick="fnc_SubmitPost()">Save</button>
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
    <script src="../../Asset/scripts/addeditpost.js"></script>
</html>
