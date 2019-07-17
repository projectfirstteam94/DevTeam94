<?php
    include_once ("../../Model/model_hoadon.php");
    $donhang = laySoDonHang();

    // phân trang chưa xem
    $sotin = 4;
    $trang = laySoTrangHD($sotin);
    if(isset($_GET["trang"])){
        $tr = $_GET["trang"];
        if($tr > $trang){
            $tr = $trang;
        }else if($tr ==0 ){
            $tr = 1;
        }
        if($tr < 0) $tr = 1;
        $arr_hd_chua = laySoHD_ChuaXem(($tr-1)*$sotin,$sotin);
    }else{
        $tr = 1;
        $arr_hd_chua = laySoHD_ChuaXem(($tr-1)*$sotin,$sotin);
    }
    // chi tiết hoa đơn
    if(isset($_GET["chitiet"])){
        $mahd = $_GET["chitiet"];
        if(layChiTietHD($mahd) !=null){
            $arr_ct_hd = layChiTietHD($mahd);
        }
        if(thongTinKhacHang($mahd) !=null){
            $arr_tt_kh = thongTinKhacHang($mahd);
        }
    }
    if(isset($_GET["dagiao"])){
        $mahd = $_GET["dagiao"];
        if(capNhapDaXem($mahd)){
            $capnhap = 1;
        }else { $capnhap = 0;}
        //echo '<script> window.location = "hoadon.php"; </script>';
    }

    // phân trang đã xem
    $sotinxem =4 ;
    $sotrang = laySoTrangHD_DaXem($sotinxem);
    if(isset($_POST["btntim"])){

    }
    else if(isset($_GET["page"])){
            $trx = $_GET["page"];
            if($trx > $sotrang){
                $trx = $sotrang;
            }else if($trx ==0 ){
                $trx = 1;
            }
            if($trx < 0) $trx = 1;
            $arr_hd_da_xem = laySoHD_DaXem(($trx-1)*$sotinxem,$sotinxem);
        }else{
            $trx = 1;
            $arr_hd_da_xem = laySoHD_DaXem(($trx-1)*$sotinxem,$sotinxem);
        }
?>