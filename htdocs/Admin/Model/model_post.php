<?php  include_once ("model_connect.php"); ?>
<?php  include_once ("../../Model/Class/Class_Custom.php"); ?>
<?php
    $userid = 1;//$_SESSION['user_id'];
?>
<?php

function GetAllPost(){
    $sql = "SELECT p.id,p.no,p.name,p.title,p.key_word,p.facility_content,".
        "p.num_people_max,p.num_nights_min,p.price,p.facility_sub_text,p.type_id,".
        " t.name as nametype,a.name as areaname,max(i.image_path) as image_path ".
        "FROM post p JOIN image i on p.id = i.post_id " .
        "JOIN type t on t.id = p.type_id " .
        "JOIN area a on a.id = p.area_id and a.active = 1 ".
        "GROUP by p.id,p.no,p.name,p.title,p.key_word,p.facility_content, " .
        "p.num_people_max,p.num_nights_min,p.price,p.facility_sub_text,p.type_id, t.name,a.name";
    $result = mysqli_query(connect(),$sql);
    if(mysqli_num_rows($result) > 0){
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
    $sql = "SELECT * FROM post ORDER BY create_time DESC" ;
    $result = mysqli_query(connect(),$sql);
    return mysqli_num_rows($result);
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
   
    $sql = "INSERT INTO post(no, name, title, key_word, descriptions, facility_content, num_people_max, num_nights_min, price, facility_sub_text,area_id, num_bed_room, num_bath_room, active, create_user_id)".
    "VALUES ($modelpost->noImg,$modelpost->name,$modelpost->title,$modelpost->keyword,$modelpost->description,$modelpost->faccity_conten,$modelpost->max_people,$modelpost->min_night,$modelpost->price,$modelpost->sub_text,$modelpost->area,$modelpost->bed_room,$modelpost->bath_room,1,$userid)";
    $result = mysqli_query(connect(),$sql);
    if($result){
        if(mysqli_num_rows(GetPostLast()) > 0){
            $idpost = mysqli_fetch_array(GetPostLast());
            $id= $idpost['id'];
            $sql = "INSERT INTO image(no, post_id, image_path, alt, create_user_id) ".
            "VALUES ($modelimage->noImg,$id,$modelimage->url',$modelimage->alt,$userid)";
            $result = mysqli_query(connect(),$sql);
            if($result){
                return true;
            }else{
                return false;
            }
        }
        return true;
    }else return false;
}

function GetPostLast(){
    $sql = "select * from post where edit_user_id = null ORDER BY create_time DESC LIMIT 1";
    $result = mysqli_query(connect(),$sql);
    return $result;
}

function UpdatePostImage($modelpost,$modelimage){
    $now = date_create('now');
    $sql = "UPDATE `post` SET `no`=$modelpost->noImg,`name`=$modelpost->name,`title`=$modelpost->title,`key_word`=$modelpost->key_word,".
        "`descriptions`=$modelpost->descriptions,`facility_content`=$modelpost->facility_content,`num_people_max`=$modelpost->num_people_max".
        ",`num_nights_min`=$modelpost->key_word,`price`=$modelpost->key_word,`facility_sub_text`=$modelpost->key_word,`type_id`=$modelpost->key_word,".
        "`area_id`=$modelpost->area_id,`num_bed_room`=$modelpost->num_bed_room,`num_bath_room`=$modelpost->num_bath_room,`active`=1,".
        "`edit_time`= $now,`edit_user_id`=$userid WHERE post_id=$modelpost->id";
        $result = mysqli_query(connect(),$sql);
        if($result){
            // remove image in path

             // remove all image in database
            $sql = "DELETE FROM image WHERE post_id = $modelpost->id";
            $result = mysqli_query(connect(),$sql);
            if($result){
                $id = $idpost['id'];
                $sql = "INSERT INTO `image`(`no`, `post_id`, `image_path`, `alt`, `create_user_id`) ".
                "VALUES ($modelimage->noImg,$id,$modelimage->url,$modelimage->alt,$userid";
                $result = mysqli_query(connect(),$sql);
                    if($result){
                        return true;
                    }else{
                        return false;
                    }
            }
            return true;
    }else return false;
}

?>