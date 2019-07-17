<?php
    include_once ("model_ketnoi.php");
    function laySoDonHang(){
        $sql = "SELECT * FROM tbl_hoadon WHERE TrangThai=0";
        $result = mysqli_query(connect(),$sql);
        $row = mysqli_num_rows($result);
        if($row > 0){
            return $row;
        }else return 0;
    }
    function donHangChuaXem(){
        $sql = "SELECT * FROM tbl_hoadon WHERE TrangThai=0";
        $result = mysqli_query(connect(),$sql);
        if(mysqli_num_rows($result)>0){
            return $result;
        }else return null;
    }
    function laySoTrangHD($count){
        $sql = "SELECT * FROM tbl_hoadon WHERE TrangThai=0";
        $result = mysqli_query(connect(),$sql);
        $tong = mysqli_num_rows($result);
        if((int)($tong%$count) > 0){
            $tong = (int)($tong/$count) + 1;
        }else $tong = (int)($tong/$count);
        return $tong;
    }
    function laySoHD_ChuaXem($start,$count){
        $sql = "SELECT * FROM tbl_hoadon WHERE TrangThai=0 LIMIT $start , $count";
        if($result = mysqli_query(connect(),$sql)){
            if(mysqli_num_rows($result)>0){
                return $result;
            }else return null;
        }else return "error";
    }
    function laySoTrangHD_DaXem($count){
        $sql = "SELECT * FROM tbl_hoadon WHERE TrangThai=1";
        $result = mysqli_query(connect(),$sql);
        $tong = mysqli_num_rows($result);
        if((int)($tong%$count) > 0){
            $tong = (int)($tong/$count) + 1;
        }else $tong = (int)($tong/$count);
        return $tong;
    }
    function laySoHD_DaXem($start,$count){
        $sql = "SELECT * FROM tbl_hoadon WHERE TrangThai='1' LIMIT $start , $count";
        if($result = mysqli_query(connect(),$sql)){
            if(mysqli_num_rows($result)>0){
                return $result;
            }else return null;
        }else return "error";
    }
    function layChiTietHD($mahd){
        $sql = "SELECT * FROM tbl_chitiethoadon AS ct INNER JOIN tbl_sanpham AS sp ON ct.Id_SanPham = sp.Ma WHERE Id='$mahd'";
        $result = mysqli_query(connect(),$sql);
        if(mysqli_num_rows($result)>0){
            return $result;
        }else return null;
    }
    function thongTinKhacHang($mahd){
        $sql = "SELECT * FROM tbl_hoadon AS hd INNER JOIN tbl_khachang AS kh ON hd.Id_KhacHang = kh.Id WHERE hd.Id='$mahd'";
        $result = mysqli_query(connect(),$sql);
        if(mysqli_num_rows($result)>0){
            return $result;
        }else return null;
    }
    function capNhapDaXem($mahd){
        $sql1 = "UPDATE tbl_hoadon SET TrangThai=1 WHERE Id='$mahd'";
        $result = mysqli_query(connect(),$sql1);
        if($result){
            return true;
        }else return false;
    }
?>