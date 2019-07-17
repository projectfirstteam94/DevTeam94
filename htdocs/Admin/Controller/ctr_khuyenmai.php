<?php
    include_once ("../../Model/model_sanpham.php");
    if(isset($_GET["khuyenmai"])){
        $ma = $_GET["khuyenmai"];
        if(laySP($ma) !=null){
            $arr_sp_km = laySP($ma);
        }
    }
    if(isset($_POST["btnkhuyenmai"])){
        $check_km = 0;
        $ma = $_POST["matruoc"];
        $khuyenmai = $_POST["giakhuyenmai"];
        if(khuyenMaiSP($ma,$khuyenmai)){
            $check_km = 1;
        }else $check_km = 0;
    }
    if(laySpKhuyenMai() !=null){
        $arr_ds_km = laySpKhuyenMai();
    }
?>