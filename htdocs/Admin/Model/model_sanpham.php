<?php  include_once ("model_ketnoi.php"); ?>
<?php

    function getAll(){
        $sql = "SELECT * FROM tbl_sanpham as sp INNER JOIN  tbl_luongsanpham as sl ON sp.Ma = sl.MaSP";
        if($result = mysqli_query(connect(),$sql)){
            if(mysqli_num_rows($result)>0){
                return $result;
            }else $arr = null;
        }
        return $arr;
    }
    function getSp($ma,$kichthuoc){
        $sql = "SELECT * FROM tbl_sanpham as sp INNER JOIN  tbl_luongsanpham as sl ON sp.Ma = sl.MaSP WHERE Ma='$ma' AND KichCo='$kichthuoc'";
        $result = mysqli_query(connect(),$sql);
        if(mysqli_num_rows($result) > 0){
            return $result;
        }else return null;
    }
    function laySP($masp){
        $sql = "SELECT * FROM tbl_sanpham WHERE Ma='$masp'";
        $result = mysqli_query(connect(),$sql);
        if(mysqli_num_rows($result) > 0){
            return $result;
        }else return null;
    }

    //dùng tên để truy xuất dữ liệu
//    function getName(){
//        $sql = "SELECT * FROM tbl_sanpham";
//        if($result = mysqli_query(connect(),$sql)){
//            if(mysqli_num_rows($result)>0){
//                return $result;
//            }else $arr = null;
//        }
//        return $arr;
//    }

    function checkId($id){
        $sql = "SELECT * FROM tbl_sanpham WHERE Ma='$id'";
        $result = mysqli_query(connect(),$sql);
        if(mysqli_num_rows($result)>0){
            return true;
        }else return false;
    }
    function checkIdEdit($idsua,$id){
        $sql = "SELECT * FROM tbl_sanpham WHERE Ma='$idsua' AND Ma!='$id'";
        $result = mysqli_query(connect(),$sql);
        if(mysqli_num_rows($result)>0){
            return true;
        }else return false;
    }
    function setIdDefault(){
        $sql = "SELECT * FROM tbl_sanpham";
        $result = mysqli_query(connect(),$sql);
        if(mysqli_num_rows($result)>0){
            $colums =(int) (mysqli_num_rows($result));
            if($colums < 9 ) {
                $colums = $colums + 1;
                return "SP0".$colums;
            } else{
                return "SP".($colums + 1) ;
            }


        }else return 0;
    }
    function insertSp($id,$name,$loai,$gianhap,$giaban,$nhacc,$anh,$chuthich){
        $date = date('Y-m-d');
        $sql = "INSERT INTO tbl_sanpham VALUES('$id','$name','$loai','$gianhap','$giaban','$nhacc','$date',NULL,'$anh','$chuthich')";
        $result = mysqli_query(connect(),$sql);
        if($result){
            return true;
        }else return false;
    }
    function insertLuongSP($ma,$kichco,$soluong){
        $sql1= "SELECT * FROM tbl_luongsanpham WHERE MaSP='$ma' AND KichCo='$kichco'";
        $result11 = mysqli_query(connect(),$sql1);
        if(mysqli_num_rows($result11) > 0){
            $r = mysqli_fetch_array($result11);
            $soluong = $soluong + $r["SoLuong"];
            $sql2="UPDATE tbl_luongsanpham SET SoLuong='$soluong' WHERE MaSP='$ma' AND KichCo='$kichco' ";
            $result2 = mysqli_query(connect(),$sql2);
            if($result2) return true;
            else return false;
        }else {
            $sql = "INSERT INTO tbl_luongsanpham VALUES ('$ma','$kichco',$soluong)";
            $result = mysqli_query(connect(),$sql);
            if($result) return true;
            else return false;
        }

    }
    function editSP($masua,$ten,$loai,$gianhap,$giaban,$nhacc,$anh,$chuthich,$kichcosua,$soluongsua,$ma,$kichco){
        $date = date('Y-m-d');
        if(checkId($masua)){
            $sql = "UPDATE tbl_sanpham SET Ma='$masua',Ten='$ten',LoaiSP='$loai',GiaNhap='$gianhap',GiaBan='$giaban',NhaCC='$nhacc',NgayNhap='$date',Anh='$anh',ChuThich='$chuthich' WHERE Ma='$ma'";
            $result = mysqli_query(connect(),$sql);
            if($result){
                $sql1 = "UPDATE tbl_luongsanpham SET KichCo='$kichcosua',SoLuong='$soluongsua' WHERE MaSP='$ma' AND KichCo='$kichco'";
                $result1 = mysqli_query(connect(),$sql1);
                if($result1)
                    return true;
                else return false;
            }else return false;
        }else{
            $sql = "UPDATE tbl_sanpham SET Ma='$masua',Ten='$ten',LoaiSP='$loai',GiaNhap='$gianhap',GiaBan='$giaban',NhaCC='$nhacc',NgayNhap='$date',Anh='$anh',ChuThich='$chuthich' WHERE Ma='$ma'";
            $result = mysqli_query(connect(),$sql);
            if($result){
                $sql1 = "UPDATE tbl_luongsanpham SET MaSP='$masua' WHERE MaSP='$ma'"; // thay đổi mã
                $result1 = mysqli_query(connect(),$sql1);
                    // rồi mới đổi thông tin sau
                $sql2 = "UPDATE tbl_luongsanpham SET KichCo='$kichcosua',SoLuong='$soluongsua' WHERE MaSP='$masua' AND KichCo='$kichco'";
                $result2 = mysqli_query(connect(),$sql2);
                if($result2)
                    return true;
                else return false;
            }else return false;
        }

    }
    function deleteSP($id,$size){
        $sql1 = "SELECT * FROM tbl_luongsanpham WHERE MaSP='$id'";
        $result1 = mysqli_query(connect(),$sql1);
        $row = mysqli_num_rows($result1);
        if($row == 1){
            $sql = "DELETE FROM tbl_sanpham  WHERE Ma='$id'";
            $result = mysqli_query(connect(),$sql);
            if($result){
                $sql2 = "DELETE FROM tbl_luongsanpham  WHERE MaSP='$id'";
                $result2 = mysqli_query(connect(),$sql2);
                if($result2){
                    return true;
                }else return false;
            }
        }else if($row > 0){
            $sql3 = "DELETE FROM tbl_luongsanpham WHERE MaSP='$id' AND KichCo='$size'";
            $result3 = mysqli_query(connect(),$sql3);
            if($result3){
                    return true;
                }else return false;
            }
    }
    function getTongSP(){

    }
    function phanTrang($start,$count,$search,$valuesearch){
        if($search==""){
            $sql = "SELECT * FROM tbl_sanpham LIMIT $start , $count";
        }
        else {
            $sql = "SELECT * FROM tbl_sanpham WHERE $search='$valuesearch' LIMIT $start , $count";
        }
        if($result = mysqli_query(connect(),$sql)){
            if(mysqli_num_rows($result)>0){
                $arr = $result;
            }else $arr = null;
        }
        return $arr;
    }
    function laySoSP($start,$count){
        $sql = "SELECT * FROM tbl_sanpham as sp INNER JOIN  tbl_luongsanpham as sl ON sp.Ma = sl.MaSP LIMIT $start , $count";
        if($result = mysqli_query(connect(),$sql)){
            if(mysqli_num_rows($result)>0){
                return $result;
            }else return null;
        }else return "error";
    }
    function laySoTrang($count){
        $sql = "SELECT * FROM tbl_luongsanpham";
        $result = mysqli_query(connect(),$sql);
        $tong = mysqli_num_rows($result);
        if((int)($tong%$count) > 0){
            $tong = (int)($tong/$count) + 1;
        }else $tong = (int)($tong/$count);
        return $tong;
    }
    function spTimKiem($search,$value){
        if($search == 0){ // tìm theo
            $sql = "SELECT * FROM tbl_sanpham as sp INNER JOIN  tbl_luongsanpham as sl ON sp.Ma = sl.MaSP WHERE Ma='$value'";
            $result = mysqli_query(connect(),$sql);
            if(mysqli_num_rows($result)>0){
                return $result;
            }else return null;

        }else if($search==1){  // tìm kiếm theo tên
            $sql1 = "SELECT * FROM tbl_sanpham as sp INNER JOIN  tbl_luongsanpham as sl ON sp.Ma = sl.MaSP WHERE Ten LIKE '%".$value."%'";
            $result1 = mysqli_query(connect(),$sql1);
            if(mysqli_num_rows($result1)>0){
                return $result1;
            }else return null;
        }
    }
    function khuyenMaiSP($masp,$khuyenmai){
        $sql = "SELECT * FROM tbl_khuyenmai WHERE MaSP='$masp'";
        $result = mysqli_query(connect(),$sql);
        if(mysqli_num_rows($result)>0){
            $sql1 = "UPDATE tbl_khuyenmai SET GiaKhuyenMai = '$khuyenmai' WHERE MaSP='$masp'";
            $result1 = mysqli_query(connect(),$sql1);
            if($result1){
                return true;
            }else return false;
        }else {
            $sql1 = "INSERT INTO tbl_khuyenmai VALUES ('$masp','$khuyenmai',NULL )";
            $result1 = mysqli_query(connect(),$sql1);
            if($result1){
                return true;
            }else return false;
        }
    }
    function laySpKhuyenMai(){
        $sql = "SELECT * FROM tbl_sanpham as sp INNER JOIN  tbl_khuyenmai as km ON sp.Ma = km.MaSP";
        $result = mysqli_query(connect(),$sql);
        $row = mysqli_num_rows($result);
        if($row > 0){
            return $result;
        }else return null;
    }
?>
