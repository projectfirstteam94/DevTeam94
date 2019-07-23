<?php  include_once ("model_connect.php"); ?>
<?php  include_once ("../../Model/Class/Class_Custom.php"); ?>

<?php
$userid = 1;//$_SESSION['user_id'];

function GetAllPost(){
	$common_path = "../../Upload/Images/";
    $sql = "SELECT p.id,p.no,p.name,p.title,p.key_word,p.facility_content,".
        "p.num_people_max,p.num_nights_min,p.price,p.facility_sub_text,p.type_id,".
        " t.name as nametype,a.name as areaname,max(i.image_path) as image_path ,".
        "p.num_people_max,p.num_nights_min,p.price,p.facility_sub_text,p.type_id,p.create_time,".
        " t.name as nametype,a.name as areaname, concat('$common_path', min(i.image_path)) as image_path,u.name as create_user ".
        "FROM post p JOIN image i on p.id = i.post_id " .
        "JOIN type t on t.id = p.type_id " .
        "JOIN area a on a.id = p.area_id and a.active = 1 ".
		"LEFT JOIN user u on u.id = p.create_user_id ".
        "GROUP by p.id,p.no,p.name,p.title,p.key_word,p.facility_content, " .
        "p.num_people_max,p.num_nights_min,p.price,p.facility_sub_text,p.type_id, t.name,a.name";
    $result = mysqli_query(connect(),$sql);
    if(mysqli_num_rows($result) > 0){
        return $result;
    }else return null;
}

function GeyPostById($id){
    $common_path = "../../Upload/Images/";
    $sql = "SELECT p.id,p.no,p.name,p.title,p.key_word,p.facility_content,".
        "p.num_people_max,p.num_nights_min,p.price,p.facility_sub_text,p.type_id,".
        " t.name as nametype,a.name as areaname,max(i.image_path) as image_path ,".
        "p.num_people_max,p.num_nights_min,p.price,p.facility_sub_text,p.type_id,p.create_time,".
        " t.name as nametype,a.name as areaname, concat('$common_path', min(i.image_path)) as image_path,u.name as create_user ".
        "FROM post p JOIN image i on p.id = i.post_id " .
        "JOIN type t on t.id = p.type_id " .
        "JOIN area a on a.id = p.area_id and a.active = 1 ".
		"LEFT JOIN user u on u.id = p.create_user_id ".
        "where p.id=$id";
    $result = mysqli_query(connect(),$sql);
    if(mysqli_num_rows($result)>0){
        return $result;
    }else return null;
}

function CheckPost($id){
    $sql = "SELECT * FROM post WHERE id=$id" ;
    $result = mysqli_query(connect(),$sql);
    if(mysqli_num_rows($result)>0){
        return true;
    }else return false;
}

function GetSttPost(){
    $sql = "select * from post where edit_user_id is null ORDER BY create_time DESC LIMIT 1" ;
    $result = mysqli_query(connect(),$sql);
    if(mysqli_num_rows($result) > 0){
        return (int)mysqli_fetch_array($result)['id'] + 1;
    }else return 0;
}

function GetAllType(){
    $sql = "SELECT * FROM type ";
    $result = mysqli_query(connect(),$sql);
    if(mysqli_num_rows($result) > 0){
        return $result;
    }else return null;
}

function GetAllArea(){
    $sql = "SELECT * FROM area WHERE active = 1";
    $result = mysqli_query(connect(),$sql);
    if(mysqli_num_rows($result) > 0){
        return $result;
    }else return null;
}

function InsertPostImage($modelpost,$modelimage){
    $userid = 1;//$_SESSION['user_id'];
    $sql = "INSERT INTO post(no, name, title, key_word, descriptions, facility_content, num_people_max, num_nights_min, price, facility_sub_text,type_id,area_id, num_bed_room, num_bath_room, active, create_user_id)".
    "VALUES ($modelpost->noImg, '$modelpost->name', '$modelpost->title', '$modelpost->keyword', '$modelpost->description', '$modelpost->faccity_conten', $modelpost->max_people, $modelpost->min_night, $modelpost->price, '$modelpost->sub_text', $modelpost->type, $modelpost->area, $modelpost->bed_room, $modelpost->bath_room, 1, $userid)";
    $result = mysqli_query(connect(),$sql);
    $id = null;
    if($result){
        if(mysqli_num_rows(GetPostLast()) > 0){
            $idpost = mysqli_fetch_array(GetPostLast());
            $id= $idpost['id'];
            foreach ($modelimage as $image ){
                $sql = "INSERT INTO image(no, post_id, image_path, alt, create_user_id) ".
                "VALUES ($image->noImg,$id,'$image->url','$image->alt',$userid)";
                $result = mysqli_query(connect(),$sql);
            }
            return $id;
        }
            return $id;
    }else return $id;
}

function GetPostLast(){
    $sql = "select * from post where edit_user_id is null ORDER BY create_time DESC LIMIT 1";
    $result = mysqli_query(connect(),$sql);
    return $result;
}

function UpdatePostImage($modelpost,$modelimage){
    $userid = 1;//$_SESSION['user_id'];
    $now = date_format(date_create('now'),'Y-m-d H:i:s ');
    $sql = "UPDATE post SET no=$modelpost->noImg,name='$modelpost->name',title='$modelpost->title',key_word='$modelpost->keyword',".
        "descriptions='$modelpost->description',facility_content='$modelpost->faccity_conten',num_people_max=$modelpost->max_people".
        ",num_nights_min=$modelpost->min_night,price=$modelpost->price,facility_sub_text='$modelpost->sub_text',type_id=$modelpost->type,".
        "area_id=$modelpost->area,num_bed_room=$modelpost->bed_room,num_bath_room=$modelpost->bath_room,active=1,".
        "edit_time= '$now',edit_user_id=$userid WHERE post_id=$modelpost->id";
    $result = mysqli_query(connect(),$sql);
    $id = null;
    if($result){
        // remove image in path
        $sql = "SELECT * FROM image WHERE post_id = $modelpost->id";
        $result = mysqli_query(connect(),$sql);
        if(mysqli_num_rows($result) > 0){
            foreach ($modelimage as $image ){
                $path = '../../Upload/Images/' . $image->url;
                if (file_exists($path)) {
                    unlink($path);
                } else {
                        echo 'Could not delete '.$path.', file does not exist';
                    }
                }
            }
             // remove all image in database
            $sql = "DELETE FROM image WHERE post_id = $modelpost->id";
            $result = mysqli_query(connect(),$sql);
            if($result){
                $id = $modelpost->id;
                while ($image = mysqli_fetch_assoc($modelimage)){
                    $sql = "INSERT INTO image(no, post_id, image_path, alt, create_user_id) ".
                    "VALUES ($image->noImg,$id,'$image->url','$image->alt',$userid)";
                    $result = mysqli_query(connect(),$sql);
                }
                return  $id;
            }
            return $id;
    }else  return $id;
}

?>