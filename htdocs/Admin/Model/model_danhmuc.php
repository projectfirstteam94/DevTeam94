<?php
    include_once ("model_ketnoi.php");
    function getLoaiSP(){
        $sql = "SELECT * FROM tbl_loaisanpham";
        if($result = mysqli_query(connect(),$sql)){
            $result = mysqli_query(connect(),$sql);
            if(mysqli_num_rows($result) > 0){
                return $result;
            }else return null;
        }
        return null;
    }
?>