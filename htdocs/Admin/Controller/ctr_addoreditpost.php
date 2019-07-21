<?php  include_once ("../../Model/model_post.php"); ?>
<?php  include_once ("../../Model/Class/Class_Custom.php"); ?>

<?php
$stt = 1;
$edit = false;
$arr_type = GetAllType();
$arr_area = GetAllArea();
$id = 0;
if(isset($_GET["id"])){
    $id = $_GET["id"];
    if(!CheckPost($id)){
        echo '
        <div class="alert alert-warning alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Không tìm thấy bài đăng</strong></div>';
        return false;
    }
    $edit = true;
    $stt = $id ;
}else{
    $stt = GetSttPost();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $type =  $_POST["type"];
        $name =  $_POST["name"];
        $keyword =  $_POST["keyword"];
        $description =  $_POST["description"];
        $title =  $_POST["title"];
        $area =  $_POST["area"];
        $noImg =  $_POST["noImg"];

        $alt1 =  $_POST["alt1"];
        $alt2 =  $_POST["alt2"];
        $alt3 =  $_POST["alt3"];
        $alt4 =  $_POST["alt4"];
        $alt5 =  $_POST["alt5"];
        $alt6 =  $_POST["alt6"];
        $alt7 =  $_POST["alt7"];
        $alt8 =  $_POST["alt8"];
        $alt9 =  $_POST["alt9"];

        $noImg1 =  $_POST["noImg1"];
        $noImg2 =  $_POST["noImg2"];
        $noImg3 =  $_POST["noImg3"];
        $noImg4 =  $_POST["noImg4"];
        $noImg5 =  $_POST["noImg5"];
        $noImg6 =  $_POST["noImg6"];
        $noImg7 =  $_POST["noImg7"];
        $noImg8 =  $_POST["noImg8"];
        $noImg9 =  $_POST["noImg9"];

        $faccity_conten =  $_POST["faccity_conten"];
        $bed_room =  $_POST["bed_room"];
        $bath_room =  $_POST["bath_room"];
        $min_night =  $_POST["min_night"];
        $max_people =  $_POST["max_people"];
        $price =  $_POST["price"];
        $sub_text =  $_POST["sub_text"];

        $post = new Post();
        $post->id = $id;
        $post->type = $type;
        $post->name = $name;
        $post->keyword = $keyword;
        $post->description = $description;
        $post->title = $title;
        $post->area = $area;
        $post->noImg = $noImg;
        $post->faccity_conten = $faccity_conten;
        $post->bed_room = $bed_room;
        $post->bath_room = $bath_room;
        $post->min_night = $min_night;
        $post->max_people = $max_people;
        $post->price = $price;
        $post->sub_text = $sub_text;

        $checkerror = false;
        if ($_FILES['file1']['error'] > 0)
        {
            $checkerror = true;
            $stserr1 = "File bị lỗi";
        }
        if ($_FILES['file2']['error'] > 0)
        {
            $checkerror = true;
            $stserr2 = "File bị lỗi";
        }
        if ($_FILES['file3']['error'] > 0)
        {
            $checkerror = true;
            $stserr3 = "File bị lỗi";
        }
        if ($_FILES['file4']['error'] > 0)
        {
            $checkerror = true;
            $stserr4 = "File bị lỗi";
        }
        if ($_FILES['file5']['error'] > 0)
        {
            $checkerror = true;
            $stserr5 = "File bị lỗi";
        }
        if ($_FILES['file6']['error'] > 0)
        {
            $checkerror = true;
            $stserr6 = "File bị lỗi";
        }
        if ($_FILES['file7']['error'] > 0)
        {
            $checkerror = true;
            $stserr7= "File bị lỗi";
        }
        if ($_FILES['file8']['error'] > 0)
        {
            $checkerror = true;
            $stserr8 = "File bị lỗi";
        }
        if ($_FILES['file9']['error'] > 0)
        {
            $checkerror = true;
            $stserr9 = "File bị lỗi";
        }
        $customname1 = "";
        $customname2 = "";
        $customname3 = "";
        $customname4 = "";
        $customname5 = "";
        $customname6 = "";
        $customname7 = "";
        $customname8 = "";
        $customname9 = "";
        
        if($checkerror ==  true){
            $customname1 = '../../Upload/Images/' . $_POST['noImg1'] . "_" . $stt ."_" . $_FILES['file1']['name'];
            if(((int)$_FILES['file1']['size'] / 1024) >= 1024){
                $stserr1= "Dung lượng file không thể lớn hơn 1Mb";
            }else{
                move_uploaded_file($_FILES['file1']['tmp_name'], $customname1);
            }
    
            $customname2 = '../../Upload/Images/' .$_POST['noImg2'] . "_" . $stt ."_" . $_FILES['file2']['name'];
            if(((int)$_FILES['file2']['size'] / 1024) >= 1024){
                $stserr2= "Dung lượng file không thể lớn hơn 1Mb";
            }else{
                move_uploaded_file($_FILES['file2']['tmp_name'],$customname2);
            }
    
            $customname3 = '../../Upload/Images/' .$_POST['noImg3'] . "_" . $stt ."_" .$_FILES['file3']['name'];
            if(((int)$_FILES['file3']['size'] / 1024) >= 1024){
                $stserr3= "Dung lượng file không thể lớn hơn 1Mb";
            }else{
                move_uploaded_file($_FILES['file3']['tmp_name'], $customname3);
            }
    
            $customname4 = '../../Upload/Images/' .$_POST['noImg4'] . "_" . $stt ."_" . $_FILES['file4']['name'];
            if(((int)$_FILES['file4']['size'] / 1024) >= 1024){
                $stserr4= "Dung lượng file không thể lớn hơn 1Mb";
            }else{
                move_uploaded_file($_FILES['file4']['tmp_name'],  $customname4);
            }
    
            $customname5 = '../../Upload/Images/' .$_POST['noImg5'] . "_" . $stt ."_" . $_FILES['file5']['name'];
            if(((int)$_FILES['file5']['size'] / 1024) >= 1024){
                $stserr5= "Dung lượng file không thể lớn hơn 1Mb";
            }else{
                move_uploaded_file($_FILES['file5']['tmp_name'], $customname5);
            }
    
            $customname6 = '../../Upload/Images/' .$_POST['noImg4'] . "_" . $stt ."_" . $_FILES['file6']['name'];
            if(((int)$_FILES['file6']['size'] / 1024) >= 1024){
                $stserr6= "Dung lượng file không thể lớn hơn 1Mb";
            }else{
                move_uploaded_file($_FILES['file6']['tmp_name'], $customname6);
            }
    
            $customname7 = '../../Upload/Images/' .$_POST['noImg4'] . "_" . $stt ."_" . $_FILES['file7']['name'];
            if(((int)$_FILES['file7']['size'] / 1024) >= 1024){
                $stserr7= "Dung lượng file không thể lớn hơn 1Mb";
            }else{
                move_uploaded_file($_FILES['file7']['tmp_name'], $customname7);
            }
    
            $customname8 = '../../Upload/Images/' .$_POST['noImg4'] . "_" . $stt ."_" . $_FILES['file8']['name'];
            if(((int)$_FILES['file8']['size'] / 1024) >= 1024){
                $stserr8= "Dung lượng file không thể lớn hơn 1Mb";
            }else{
                move_uploaded_file($_FILES['file8']['tmp_name'], $customname8);
            }
    
            $customname9 = '../../Upload/Images/' .$_POST['noImg4'] . "_" . $stt ."_" . $_FILES['file9']['name'];
            if(((int)$_FILES['file9']['size'] / 1024) >= 1024){
                $stserr9= "Dung lượng file không thể lớn hơn 1Mb";
            }else{
                move_uploaded_file($_FILES['file9']['tmp_name'], $customname9);
            }
        }
        $arrImage = [];
        $image1 = new Image();
        $image1->alt = $alt1;
        $image1->noImg = $noImg1;
        $image1->url = $customname1;
        array_push($arrImage,$image1);

        $image2 = new Image();
        $image2->alt = $alt2;
        $image2->noImg = $noImg2;
        $image2->url = $customname2;
        array_push($arrImage,$image2);

        $image3 = new Image();
        $image3->alt = $alt3;
        $image3->noImg = $noImg3;
        $image3->url = $customname3;
        array_push($arrImage,$image3);

        $image4 = new Image();
        $image4->alt = $alt4;
        $image4->noImg = $noImg4;
        $image4->url = $customname4;
        array_push($arrImage,$image4);

        $image5 = new Image();
        $image5->alt = $alt5;
        $image5->noImg = $noImg5;
        $image5->url = $customname5;
        array_push($arrImage,$image5);

        $image6 = new Image();
        $image6->alt = $alt6;
        $image6->noImg = $noImg6;
        $image6->url = $customname6;
        array_push($arrImage,$image6);

        $image7 = new Image();
        $image7->alt = $alt7;
        $image7->noImg = $noImg7;
        $image7->url = $customname7;
        array_push($arrImage,$image7);

        $image8 = new Image();
        $image8->alt = $alt8;
        $image8->noImg = $noImg8;
        $image8->url = $customname8;
        array_push($arrImage,$image8);

        $image9 = new Image();
        $image9->alt = $alt9;
        $image9->noImg = $noImg9;
        $image9->url = $customname9;
        array_push($arrImage,$image9);

        if($edit){
            
            UpdatePostImage($post,$arrImage);
        }else{
            InsertPostImage($post,$arrImage);
        }
}
?>